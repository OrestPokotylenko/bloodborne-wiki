document.addEventListener("DOMContentLoaded", () => {
    const menuToggle = document.getElementById("menuToggle");
    const menuClose = document.getElementById("menuClose");
    const sidebarOpen = document.getElementById("sidebarOpen");
    const sidebarTogle = document.getElementById("sidebarToggle");
    const threadList = document.querySelector(".thread-list");
    const messageArea = document.getElementById("messages");
    const replyInput = document.getElementById("replyInput");
    const postButton = document.getElementById("postButton");
    let threads = [];
    let replies = [];

    menuToggle.addEventListener("click", () => {
        sidebarOpen.classList.remove("d-none");
        sidebarTogle.classList.add("d-none");
    });

    menuClose.addEventListener("click", () => {
        sidebarOpen.classList.add("d-none");
        sidebarTogle.classList.remove("d-none");
    });

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

    // Load thread messages
    async function loadThread(threads, index) {
        messageArea.innerHTML = "";
        const thread = threads[index];
        document.querySelector(".thread-title").textContent = thread.title;

        replies.length = 0;
        replies = await getReplies(thread.threadId);
        replies.forEach((reply) => {
            const msgDiv = document.createElement("div");
            msgDiv.textContent = reply.content;
            msgDiv.classList.add("message");
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
            msgDiv.textContent = content;
            msgDiv.classList.add("message");
            messageArea.appendChild(msgDiv);
    
            try {
                const response = await fetch("/api/post-reply", {
                    method: "POST",
                    credentials: 'same-origin',
                    headers: {
                        "-ContentType": "application/json",
                    },
                    body: JSON.stringify({
                        threadId: threads[index].threadId,
                        content: content
                    }),
                });
    
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
    
                const result = await response.json();

            } catch (error) {
                console.error("Error:", error);
            }

            replyInput.value = "";
        }
    });

    loadThreads();
});
