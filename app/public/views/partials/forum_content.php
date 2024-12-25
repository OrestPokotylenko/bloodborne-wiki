<div class="background">
    <div class="forum-container">
        <aside id="sidebarToggle" class="sidebar-toggle">
            <button id="menuToggle" class="burger-button">&#9776;</button>
        </aside>
        <!-- Sidebar -->
        <aside id="sidebarOpen" class="sidebar vh-100 d-flex flex-column d-none">
            <div class="flex-grow-1">
                <button id="menuClose" class="close-button">X</button>
                <div class="search-bar">
                    <input type="text" id="searchbar" placeholder="Search threads..." />
                </div>
                <ul class="thread-list">
                </ul>
            </div>

            <button id="newThreadButton" data-bs-toggle="modal" data-bs-target="#newThreadModal">New Thread</button>
        </aside>

        <main class="main-content">
            <h2 class="thread-title">Select a thread to view messages</h2>
            <div id="messages" class="message-area">
            </div>
            <div class="reply-box">
                <textarea id="replyInput" rows="3" placeholder="Write a reply..."></textarea>
                <button id="postButton" class="post-button">Post</button>
            </div>
        </main>
    </div>
</div>

<div class="modal fade" id="newThreadModal" tabindex="-1" aria-labelledby="newThreadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <div class="modal-header d-flex justify-content-between align-items-center">
                <h5 class="modal-title" id="newThreadModalLabel">Create New Thread</h5>
                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="close-button">X</button>
            </div>
            <div class="modal-body">
                <form id="newThreadForm">
                    <div class="mb-3">
                        <input type="text" id="threadName" placeholder="Enter a title" required/>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="create-thread-button">Create Thread</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="../../assets/js/forum.js"></script>