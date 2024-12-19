<div class="background">
    <div class="forum-container">
        <aside id="sidebarToggle" class="sidebar-toggle">
            <button id="menuToggle" class="burger-button">&#9776;</button>
        </aside>
        <!-- Sidebar -->
        <aside id="sidebarOpen" class="sidebar d-none">
            <button id="menuClose" class="close-button">X</button>
            <div class="search-bar">
                <input type="text" placeholder="Search threads..." />
            </div>
            <ul class="thread-list">
                <!-- Dynamic threads will be populated here -->
            </ul>
        </aside>

        <main class="main-content">
            <h2 class="thread-title">Select a thread to view messages</h2>
            <div id="messages" class="message-area">
                <!-- Messages for selected thread -->
            </div>
            <div class="reply-box">
                <textarea id="replyInput" rows="3" placeholder="Write a reply..."></textarea>
                <button id="postButton" class="post-button">Post</button>
            </div>
        </main>
    </div>
</div>

<script src="../../assets/js/forum.js"></script>