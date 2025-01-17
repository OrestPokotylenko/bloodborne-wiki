document.addEventListener("DOMContentLoaded", () => {
    const menuToggle = document.getElementById("menuToggle");
    const menuClose = document.getElementById("menuClose");
    const sidebarOpen = document.getElementById("sidebarOpen");
    const sidebarTogle = document.getElementById("sidebarToggle");
    const threadList = document.querySelector(".thread-list");
    const messageArea = document.getElementById("messages");
    const replyInput = document.getElementById("replyInput");
    const postButton = document.getElementById("postButton");
    const newThreadForm = document.getElementById("newThreadForm");
    const threadNameInput = document.getElementById("threadName");
    const searchbar = document.getElementById("searchbar");
    const replyToDiv = document.getElementById("replyTo");
    const replyToMessage = document.getElementById("replyToMessage");
    const unattachButton = document.getElementById("unattachButton");
    let threads = [];
    let replies = [];
    let replyTo = null;

    menuToggle.addEventListener("click", () => {
        sidebarOpen.classList.remove("d-none");
        sidebarTogle.classList.add("d-none");
    });

    menuClose.addEventListener("click", () => {
        sidebarOpen.classList.add("d-none");
        sidebarTogle.classList.remove("d-none");
    });

    unattachButton.addEventListener("click", () => {
        replyTo = null;
        replyToDiv.classList.add("d-none");
    });

    searchbar.addEventListener("input", (e) => {
        const searchText = e.target.value.toLowerCase();
        filterThreads(searchText);
    });

    function filterThreads(searchText) {
        const items = document.querySelectorAll(".thread-list li");

        items.forEach((item) => {
            const threadTitle = item.textContent.toLowerCase();
            if (threadTitle.includes(searchText)) {
                item.style.display = "";
            } else {
                item.style.display = "none";
            }
        });
    }

    async function getThreads() {
        try {
            const response = await fetch("/api/get-threads");
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const json = await response.json();
            return json.data;
        } catch (error) {
            console.error("Error:", error);
            return null;
        }
    }

    async function getReplies(threadId) {
        try {
            const response = await fetch(`/api/get-replies?threadId=${threadId}`);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const json = await response.json();
            return json.data;
        } catch (error) {
            console.error("Error:", error);
            return null;
        }
    }

    async function loadThreads() {
        threads = await getThreads();

        threadList.innerHTML = "";

        threads.forEach((thread, index) => {
            const li = document.createElement("li");
            li.textContent = thread.title;
            li.addEventListener("click", () => loadThread(threads, index));
            threadList.appendChild(li);
        });
    }

    async function loadThread(threads, index) {
        messageArea.innerHTML = "";
        const thread = threads[index];
        document.querySelector(".thread-title").textContent = thread.title;
    
        replies.length = 0;
        replies = await getReplies(thread.threadId);
    
        replies.forEach((reply) => {
            const msgDiv = document.createElement("div");
            msgDiv.classList.add("message");
    
            const msgContent = document.createElement("span");
            msgContent.classList.add("message-content");
            msgContent.textContent = reply.content;
    
            const replyButton = document.createElement("button");
            replyButton.textContent = "Reply";
            replyButton.classList.add("btn", "btn-sm", "btn-outline-primary");
            replyButton.addEventListener("click", () => {
                replyTo = reply;
                replyToMessage.textContent = `Replying to: ${reply.content}`;
                replyToDiv.classList.remove("d-none");
            });
    
            msgDiv.appendChild(msgContent);
            msgDiv.appendChild(replyButton);
    
            messageArea.appendChild(msgDiv);
        });
    
        replyInput.dataset.threadIndex = index;
    }

    async function isLoggedIn() {
        try {
            const response = await fetch("includes/session/session-loggedin.php");
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const json = await response.json();
            return json.loggedIn;
        } catch (error) {
            console.error("Error:", error);
            return false;
        }
    }

    postButton.addEventListener("click", async () => {
        const loggedIn = await isLoggedIn();
    
        if (!loggedIn) {
            alert("You must be logged in to post a reply.");
            return;
        }
    
        const index = replyInput.dataset.threadIndex;
        const content = replyInput.value.trim();
    
        if (index !== undefined && content) {
            const msgDiv = document.createElement("div");
            msgDiv.classList.add("message");
            msgDiv.textContent = content;
    
            const replyButton = document.createElement("button");
            replyButton.textContent = "Reply";
            replyButton.classList.add("btn", "btn-sm", "btn-outline-primary", "ms-2");
            replyButton.addEventListener("click", () => {
                replyTo = { content };
                replyToMessage.textContent = `Replying to: ${content}`;
                replyToDiv.classList.remove("d-none");
            });
    
            msgDiv.appendChild(replyButton);
    
            messageArea.appendChild(msgDiv);
    
            try {
                const response = await fetch("/api/post-reply", {
                    method: "POST",
                    credentials: "same-origin",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        threadId: threads[index].threadId,
                        content: content,
                        parentReplyId: replyTo ? replyTo.replyId : null
                    }),
                });
    
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
    
                const result = await response.json();
                if (!result.success) {
                    console.error("Error saving reply:", result.message);
                    alert("Failed to save your reply. Please try again.");
                }
            } catch (error) {
                console.error("Error:", error);
            }
    
            replyInput.value = "";
            replyTo = null;
            replyToDiv.classList.add("d-none");
        }
    });    

    newThreadForm.addEventListener("submit", async (event) => {
        event.preventDefault();

        const title = threadNameInput.value.trim();

        try {
            const response = await fetch('/api/post-thread', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ title })
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const modal = bootstrap.Modal.getInstance(document.getElementById('newThreadModal'));
            modal.hide();
            location.reload();
        } catch (error) {
            console.error("Error creating thread:", error);
            alert("Something went wrong. Please try again.");
        }
    });

    loadThreads();
});
