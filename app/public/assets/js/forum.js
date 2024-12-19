document.addEventListener("DOMContentLoaded", () => {
    const menuToggle = document.getElementById("menuToggle");
    const menuClose = document.getElementById("menuClose");
    const sidebarOpen = document.getElementById("sidebarOpen");
    const sidebarTogle = document.getElementById("sidebarToggle");
    const threadList = document.querySelector(".thread-list");
    const messageArea = document.getElementById("messages");
    const replyInput = document.getElementById("replyInput");
    const postButton = document.getElementById("postButton");

    const threads = [
        { name: "Welcome Thread", messages: ["Welcome to the forum!", "Feel free to ask questions!"] },
        { name: "General Discussion", messages: ["This is the general thread."] },
        { name: "Bloodborne Tips", messages: ["Share your best strategies here!"] }
    ];

    // Toggle sidebar visibility
    menuToggle.addEventListener("click", () => {
        sidebarOpen.classList.remove("d-none");
        sidebarTogle.classList.add("d-none");
    });

    menuClose.addEventListener("click", () => {
        sidebarOpen.classList.add("d-none");
        sidebarTogle.classList.remove("d-none");
    });

    // Populate threads
    function loadThreads() {
        threadList.innerHTML = "";
        threads.forEach((thread, index) => {
            const li = document.createElement("li");
            li.textContent = thread.name;
            li.addEventListener("click", () => loadThread(index));
            threadList.appendChild(li);
        });
    }

    // Load thread messages
    function loadThread(index) {
        messageArea.innerHTML = "";
        const thread = threads[index];
        document.querySelector(".thread-title").textContent = thread.name;

        thread.messages.forEach((message) => {
            const msgDiv = document.createElement("div");
            msgDiv.textContent = message;
            msgDiv.classList.add("message");
            messageArea.appendChild(msgDiv);
        });

        replyInput.dataset.threadIndex = index;
    }

    // Post a reply
    postButton.addEventListener("click", () => {
        const index = replyInput.dataset.threadIndex;
        if (index !== undefined && replyInput.value.trim()) {
            threads[index].messages.push(replyInput.value.trim());
            loadThread(index);
            replyInput.value = "";
        }
    });

    // Initialize threads
    loadThreads();
});
