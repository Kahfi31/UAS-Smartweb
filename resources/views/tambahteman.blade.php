@extends('layouts.app')

@section('content')
@guest
    <div style="text-align: center; padding: 3rem;">
        <h2>Silakan Login Terlebih Dahulu</h2>
        <p>Anda harus login untuk mengakses fitur Tambah Teman</p>
        <a href="/login" style="background: #022059; color: white; padding: 0.75rem 1.5rem; text-decoration: none; border-radius: 6px; display: inline-block; margin-top: 1rem;">
            Login Sekarang
        </a>
    </div>
@else
<script>
    window.currentUserId = {{ auth()->id() }};
</script>
<style>
    /* Hide the navbar for this page only */
    .navbar { display: none !important; }
    body { background-color: #f3f4f6; }
    main { padding-top: 2rem; }
    .chat-container {
        max-width: 800px;
        margin: 0 auto;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        height: 80vh;
        display: flex;
        flex-direction: column;
    }

    .chat-header {
        background: #022059;
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 12px 12px 0 0;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .chat-header .avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #4a90e2;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }

    .chat-header .info h3 {
        margin: 0;
        font-size: 1.1rem;
    }

    .chat-header .info p {
        margin: 0;
        font-size: 0.9rem;
        opacity: 0.8;
    }

    .chat-messages {
        flex: 1;
        padding: 1rem;
        overflow-y: auto;
        background: #f8f9fa;
    }

    .message {
        margin-bottom: 1rem;
        display: flex;
        align-items: flex-end;
        gap: 0.5rem;
    }

    .message.sent {
        justify-content: flex-end;
    }

    .message.received {
        justify-content: flex-start;
    }

    .message-content {
        max-width: 70%;
        padding: 0.75rem 1rem;
        border-radius: 18px;
        word-wrap: break-word;
    }

    .message.sent .message-content {
        background: #022059;
        color: white;
        border-bottom-right-radius: 4px;
    }

    .message.received .message-content {
        background: white;
        color: #333;
        border-bottom-left-radius: 4px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    }

    .message-time {
        font-size: 0.75rem;
        opacity: 0.7;
        margin-top: 0.25rem;
    }

    .message.sent .message-time {
        text-align: right;
    }

    .message.received .message-time {
        text-align: left;
    }

    .chat-input {
        padding: 1rem;
        background: white;
        border-top: 1px solid #e5e7eb;
        border-radius: 0 0 12px 12px;
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }

    .chat-input input {
        flex: 1;
        padding: 0.75rem 1rem;
        border: 1px solid #d1d5db;
        border-radius: 25px;
        outline: none;
        font-size: 0.9rem;
    }

    .chat-input input:focus {
        border-color: #022059;
    }

    .send-button {
        background: #022059;
        color: white;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background 0.2s;
    }

    .send-button:hover {
        background: #011437;
    }

    .add-friend-button {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        background: #022059;
        color: white;
        border: none;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
        cursor: pointer;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
        z-index: 1000;
    }

    .add-friend-button:hover {
        background: #011437;
        transform: scale(1.1);
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 2000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: white;
        margin: 15% auto;
        padding: 2rem;
        border-radius: 12px;
        width: 90%;
        max-width: 400px;
        position: relative;
    }

    .close {
        position: absolute;
        right: 1rem;
        top: 1rem;
        font-size: 1.5rem;
        cursor: pointer;
        color: #666;
    }

    .close:hover {
        color: #000;
    }

    .modal h2 {
        margin-top: 0;
        color: #022059;
        text-align: center;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: #333;
    }

    .form-group input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 1rem;
        box-sizing: border-box;
    }

    .form-group input:focus {
        outline: none;
        border-color: #022059;
    }

    .submit-btn {
        width: 100%;
        background: #022059;
        color: white;
        border: none;
        padding: 0.75rem;
        border-radius: 6px;
        font-size: 1rem;
        cursor: pointer;
        margin-top: 1rem;
    }

    .submit-btn:hover {
        background: #011437;
    }

    .success-message {
        background: #d4edda;
        color: #155724;
        padding: 0.75rem;
        border-radius: 6px;
        margin-bottom: 1rem;
        display: none;
    }

    .error-message {
        background: #f8d7da;
        color: #721c24;
        padding: 0.75rem;
        border-radius: 6px;
        margin-bottom: 1rem;
        display: none;
    }

    .empty-state {
        text-align: center;
        padding: 3rem 1rem;
        color: #666;
    }

    .empty-state i {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    .empty-state h3 {
        margin-bottom: 0.5rem;
        color: #333;
    }

    .empty-state p {
        margin: 0;
        font-size: 0.9rem;
    }

    .my-pin-section {
        background: #f8f9fa;
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1rem;
        text-align: center;
    }

    .my-pin-section h4 {
        margin: 0 0 0.5rem 0;
        color: #022059;
        font-size: 0.9rem;
    }

    .pin-display {
        background: white;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        border: 2px dashed #022059;
        font-family: monospace;
        font-size: 1.2rem;
        font-weight: bold;
        color: #022059;
        margin: 0.5rem 0;
    }

    .generate-pin-btn {
        background: #28a745;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        font-size: 0.8rem;
        cursor: pointer;
        margin-top: 0.5rem;
    }

    .generate-pin-btn:hover {
        background: #218838;
    }

    .friends-list {
        margin-top: 1rem;
    }

    .friend-item {
        display: flex;
        align-items: center;
        padding: 0.75rem;
        background: white;
        border-radius: 8px;
        margin-bottom: 0.5rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .friend-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #4a90e2;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 0.75rem;
        color: white;
        font-weight: bold;
    }

    .friend-info h5 {
        margin: 0;
        font-size: 0.9rem;
        color: #333;
    }

    .friend-info p {
        margin: 0;
        font-size: 0.8rem;
        color: #666;
    }

    .online-status {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #28a745;
        margin-left: auto;
    }

    .offline-status {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #6c757d;
        margin-left: auto;
    }

    .chat-tabs {
        display: flex;
        background: #f8f9fa;
        border-radius: 8px;
        margin-bottom: 1rem;
        overflow: hidden;
    }

    .chat-tab {
        flex: 1;
        padding: 0.75rem;
        text-align: center;
        background: transparent;
        border: none;
        cursor: pointer;
        font-size: 0.9rem;
        color: #666;
        transition: all 0.3s ease;
    }

    .chat-tab.active {
        background: #022059;
        color: white;
    }

    .chat-tab:hover:not(.active) {
        background: #e9ecef;
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    .copy-pin-btn {
        background: #6c757d;
        color: white;
        border: none;
        padding: 0.25rem 0.5rem;
        border-radius: 4px;
        font-size: 0.7rem;
        cursor: pointer;
        margin-left: 0.5rem;
    }

    .copy-pin-btn:hover {
        background: #5a6268;
    }

    .search-friends {
        margin-bottom: 1rem;
    }

    .search-friends input {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 0.9rem;
    }

    .search-friends input:focus {
        outline: none;
        border-color: #022059;
    }

    .demo-actions {
        text-align: center;
        margin-bottom: 1rem;
        padding: 1rem;
        background: #e3f2fd;
        border-radius: 8px;
        border: 1px solid #bbdefb;
    }

    .demo-actions h5 {
        margin: 0 0 0.5rem 0;
        color: #1976d2;
        font-size: 0.9rem;
    }

    .demo-btn {
        background: #1976d2;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        font-size: 0.8rem;
        cursor: pointer;
        margin: 0 0.25rem;
    }

    .demo-btn:hover {
        background: #1565c0;
    }

    .friend-item {
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .friend-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    /* Tambahan Media Queries Responsif */
    @media (max-width: 1024px) {
        .chat-container { max-width: 98vw; height: 90vh; }
        .modal-content { margin: 20% auto; max-width: 95vw; }
    }
    @media (max-width: 768px) {
        .chat-container { max-width: 100vw; height: 100vh; border-radius: 0; box-shadow: none; }
        .chat-header { padding: 0.75rem 1rem; border-radius: 0; }
        .chat-messages { padding: 0.5rem; }
        .chat-input { padding: 0.5rem; border-radius: 0 0 0 0; }
        .modal-content { margin: 30% auto; padding: 1rem; max-width: 98vw; }
        .add-friend-button { width: 48px; height: 48px; font-size: 1.2rem; bottom: 1rem; right: 1rem; }
        .my-pin-section, .demo-actions { padding: 0.5rem; }
        .friend-avatar { width: 32px; height: 32px; font-size: 1rem; }
        .friend-item { padding: 0.5rem; }
        .pin-display { font-size: 1rem; }
        .form-group input, .search-friends input { padding: 0.5rem; font-size: 0.95rem; }
        .submit-btn, .generate-pin-btn, .demo-btn { padding: 0.5rem; font-size: 0.95rem; }
    }
    @media (max-width: 480px) {
        .chat-container { max-width: 100vw; height: 100vh; border-radius: 0; box-shadow: none; }
        .chat-header { padding: 0.5rem 0.5rem; border-radius: 0; }
        .chat-header .avatar { width: 32px; height: 32px; font-size: 1rem; }
        .chat-header .info h3 { font-size: 1rem; }
        .chat-header .info p { font-size: 0.8rem; }
        .chat-messages { padding: 0.25rem; }
        .message-content { padding: 0.5rem 0.75rem; font-size: 0.95rem; }
        .chat-input { padding: 0.25rem; }
        .chat-input input { padding: 0.5rem 0.75rem; font-size: 0.95rem; }
        .send-button { width: 32px; height: 32px; font-size: 1rem; }
        .add-friend-button { width: 40px; height: 40px; font-size: 1rem; bottom: 0.5rem; right: 0.5rem; }
        .modal-content { margin: 40% auto; padding: 0.75rem; max-width: 99vw; }
        .form-group input, .search-friends input { padding: 0.4rem; font-size: 0.9rem; }
        .submit-btn, .generate-pin-btn, .demo-btn { padding: 0.4rem; font-size: 0.9rem; }
        .friend-avatar { width: 28px; height: 28px; font-size: 0.95rem; }
        .friend-item { padding: 0.35rem; }
        .pin-display { font-size: 0.95rem; }
    }
</style>

<div class="chat-container">
    <div class="chat-header">
        <div class="avatar">
            <i class="fas fa-users"></i>
        </div>
        <div class="info">
            <h3>Komunitas Teman</h3>
            <p>Chat dengan teman-teman Anda</p>
        </div>
    </div>

            <div class="chat-messages" id="chatMessages">
        <!-- Chat Tabs -->
        <div class="chat-tabs">
            <button class="chat-tab active" data-tab="friends">
                <i class="fas fa-users"></i> Teman
            </button>
            <button class="chat-tab" data-tab="chat">
                <i class="fas fa-comments"></i> Chat
            </button>
        </div>

        <!-- Friends Tab Content -->
        <div class="tab-content active" id="friendsTab">
            <!-- My PIN Section -->
            <div class="my-pin-section">
                <h4>PIN Saya</h4>
                <div class="pin-display" id="myPinDisplay">
                    @if(auth()->check() && auth()->user()->pin)
                        {{ auth()->user()->pin }}
                    @else
                        Belum ada PIN
                    @endif
                </div>
                <button class="copy-pin-btn" id="copyPinBtn">
                    <i class="fas fa-copy"></i> Salin PIN
                </button>
            </div>

            <!-- Search Friends -->
            <div class="search-friends">
                <input type="text" id="searchFriends" placeholder="Cari teman...">
            </div>

            <!-- Friends List -->
            <div class="friends-list" id="friendsList" style="display: none;">
                <h4 style="margin-bottom: 1rem; color: #022059;">Daftar Teman</h4>
                <div id="friendsContainer"></div>
            </div>

            <div class="empty-state" id="emptyState">
                <i class="fas fa-users"></i>
                <h3>Belum ada teman</h3>
                <p>Tambahkan teman menggunakan PIN mereka</p>
            </div>
        </div>

        <!-- Chat Tab Content -->
        <div class="tab-content" id="chatTab">
            <div id="chatContentArea">
                <div class="empty-state">
                    <i class="fas fa-comments"></i>
                    <h3>Belum ada percakapan</h3>
                    <p>Pilih teman untuk mulai chat</p>
                </div>
            </div>
        </div>
    </div>

    <div class="chat-input">
        <input type="text" id="messageInput" placeholder="Ketik pesan..." disabled>
        <button class="send-button" id="sendButton" disabled>
            <i class="fas fa-paper-plane"></i>
        </button>
    </div>
</div>

<!-- Floating Add Friend Button -->
<button class="add-friend-button" id="addFriendBtn">
    <i class="fas fa-plus"></i>
</button>

<!-- Add Friend Modal -->
<div id="addFriendModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <h2>Tambah Teman</h2>

        <div class="success-message" id="successMessage">
            Teman berhasil ditambahkan!
        </div>

        <div class="error-message" id="errorMessage">
            PIN tidak valid atau teman tidak ditemukan.
        </div>

        <form id="addFriendForm">
            @csrf
            <div class="form-group">
                <label for="friendPin">Masukkan PIN Teman:</label>
                <input type="text" id="friendPin" name="pin" placeholder="Contoh: 123456" maxlength="6" required>
            </div>
            <button type="submit" class="submit-btn">Tambah Teman</button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const addFriendBtn = document.getElementById('addFriendBtn');
    const modal = document.getElementById('addFriendModal');
    const closeModal = document.getElementById('closeModal');
    const addFriendForm = document.getElementById('addFriendForm');
    const successMessage = document.getElementById('successMessage');
    const errorMessage = document.getElementById('errorMessage');
    const messageInput = document.getElementById('messageInput');
    const sendButton = document.getElementById('sendButton');
    const chatMessages = document.getElementById('chatMessages');
    const friendsList = document.getElementById('friendsList');
    const friendsContainer = document.getElementById('friendsContainer');
    const emptyState = document.getElementById('emptyState');
    const copyPinBtn = document.getElementById('copyPinBtn');
    const searchFriends = document.getElementById('searchFriends');
    const chatTabs = document.querySelectorAll('.chat-tab');
    const tabContents = document.querySelectorAll('.tab-content');
    const chatContentArea = document.getElementById('chatContentArea');

    // Show modal
    addFriendBtn.addEventListener('click', function() {
        modal.style.display = 'block';
        successMessage.style.display = 'none';
        errorMessage.style.display = 'none';
        document.getElementById('friendPin').value = '';
    });

    // Close modal
    closeModal.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });

    // Handle form submission
    addFriendForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const pin = document.getElementById('friendPin').value;

        // Show loading state
        const submitBtn = addFriendForm.querySelector('.submit-btn');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Menambahkan...';
        submitBtn.disabled = true;

        // Simulate API call (replace with actual endpoint)
        fetch('/api/add-friend', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ pin: pin })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                successMessage.style.display = 'block';
                errorMessage.style.display = 'none';

                // Hide modal after 2 seconds
                setTimeout(() => {
                    modal.style.display = 'none';
                    successMessage.style.display = 'none';
                }, 2000);

                                 // Refresh friends list
                 loadFriends();
                         } else {
                 errorMessage.textContent = data.message || 'PIN tidak valid atau teman tidak ditemukan.';
                 errorMessage.style.display = 'block';
                 successMessage.style.display = 'none';
             }
        })
        .catch(error => {
            console.error('Error:', error);
            errorMessage.style.display = 'block';
            successMessage.style.display = 'none';
        })
        .finally(() => {
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        });
    });

    // Handle sending messages
    sendButton.addEventListener('click', sendMessage);
    messageInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });

    let currentChatFriend = null;

    function renderMessages(messages) {
        if (!messages.length) {
            chatContentArea.innerHTML = `<div class='empty-state'><i class='fas fa-comments'></i><h3>Belum ada percakapan</h3><p>Ketik pesan untuk memulai percakapan</p></div>`;
            return;
        }
        chatContentArea.innerHTML = '';
        messages.forEach(msg => {
            const type = msg.sender_id == window.currentUserId ? 'sent' : 'received';
            const messageDiv = document.createElement('div');
            messageDiv.className = `message ${type}`;
            messageDiv.innerHTML = `
                <div class="message-content">
                    <div>${msg.content}</div>
                    <div class="message-time">${new Date(msg.created_at).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}</div>
                </div>
            `;
            chatContentArea.appendChild(messageDiv);
        });
        chatContentArea.scrollTop = chatContentArea.scrollHeight;
    }

    function sendMessage() {
        const message = messageInput.value.trim();
        if (!message || messageInput.disabled || !currentChatFriend) return;
        sendButton.disabled = true;
        fetch('/api/messages/send', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                receiver_id: currentChatFriend.id,
                content: message
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                messageInput.value = '';
                // Ambil ulang pesan setelah kirim
                fetch(`/api/messages/${currentChatFriend.id}`)
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) renderMessages(data.messages);
                    });
            } else {
                showErrorMessage('Gagal mengirim pesan');
            }
        })
        .catch(() => showErrorMessage('Gagal mengirim pesan'))
        .finally(() => {
            sendButton.disabled = false;
        });
    }

    function createMessageElement(text, type) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${type}`;

        const now = new Date();
        const time = now.getHours().toString().padStart(2, '0') + ':' +
                    now.getMinutes().toString().padStart(2, '0');

        messageDiv.innerHTML = `
            <div class="message-content">
                <div>${text}</div>
                <div class="message-time">${time}</div>
            </div>
        `;

        return messageDiv;
    }

    // PIN input validation (only numbers, max 6 digits)
    document.getElementById('friendPin').addEventListener('input', function(e) {
        this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6);
    });

    // Tab switching functionality
    chatTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');

            // Remove active class from all tabs and contents
            chatTabs.forEach(t => t.classList.remove('active'));
            tabContents.forEach(c => c.classList.remove('active'));

            // Add active class to clicked tab and corresponding content
            this.classList.add('active');
            document.getElementById(targetTab + 'Tab').classList.add('active');

            // Hide chat content when switching away from chat tab
            if (targetTab === 'chat') {
                chatContentArea.innerHTML = `
                    <div class="empty-state">
                        <i class="fas fa-comments"></i>
                        <h3>Belum ada percakapan</h3>
                        <p>Pilih teman untuk mulai chat</p>
                    </div>
                `;
                messageInput.disabled = true;
                sendButton.disabled = true;
            } else {
                // Ensure chat content is empty when switching to friends tab
                chatContentArea.innerHTML = '';
                messageInput.disabled = true;
                sendButton.disabled = true;
            }
        });
    });

    // Copy PIN functionality
    copyPinBtn.addEventListener('click', function() {
        const pin = myPinDisplay.textContent;
        if (pin && pin !== 'Belum ada PIN') {
            navigator.clipboard.writeText(pin).then(() => {
                showSuccessMessage('PIN berhasil disalin!');
            }).catch(() => {
                showErrorMessage('Gagal menyalin PIN');
            });
        } else {
            showErrorMessage('PIN belum dibuat');
        }
    });

    // Search friends functionality
    searchFriends.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const friendItems = friendsContainer.querySelectorAll('.friend-item');

        friendItems.forEach(item => {
            const friendName = item.querySelector('h5').textContent.toLowerCase();
            if (friendName.includes(searchTerm)) {
                item.style.display = 'flex';
            } else {
                item.style.display = 'none';
            }
        });
    });

    // Load friends on page load
    loadFriends();

    function loadFriends() {
        fetch('/api/friends')
        .then(response => response.json())
        .then(data => {
            if (data.success && data.friends.length > 0) {
                displayFriends(data.friends);
                emptyState.style.display = 'none';
                friendsList.style.display = 'block';
                messageInput.disabled = true; // Disable chat input in friends tab
                sendButton.disabled = true;
            } else {
                emptyState.style.display = 'block';
                friendsList.style.display = 'none';
                messageInput.disabled = true;
                sendButton.disabled = true;
            }
        })
        .catch(error => {
            console.error('Error loading friends:', error);
        });
    }

    function displayFriends(friends) {
        friendsContainer.innerHTML = '';
        friends.forEach(friend => {
            const friendElement = document.createElement('div');
            friendElement.className = 'friend-item';
            // Random online status for demo
            const isOnline = Math.random() > 0.5;
            friendElement.innerHTML = `
                <div class="friend-avatar">
                    ${friend.first_name.charAt(0).toUpperCase()}
                </div>
                <div class="friend-info">
                    <h5>${friend.first_name} ${friend.last_name}</h5>
                    <p>PIN: ${friend.pin}</p>
                </div>
                <div class="${isOnline ? 'online-status' : 'offline-status'}" title="${isOnline ? 'Online' : 'Offline'}"></div>
            `;

            // Add click event to start chat
            friendElement.addEventListener('click', function() {
                startChatWithFriend(friend);
            });

            friendsContainer.appendChild(friendElement);
        });
    }

    function startChatWithFriend(friend) {
        currentChatFriend = friend;
        // Switch to chat tab
        chatTabs.forEach(t => t.classList.remove('active'));
        tabContents.forEach(c => c.classList.remove('active'));

        document.querySelector('[data-tab="chat"]').classList.add('active');
        document.getElementById('chatTab').classList.add('active');

        // Update chat header
        const chatHeader = document.querySelector('.chat-header .info h3');
        chatHeader.textContent = friend.first_name + ' ' + friend.last_name;

        // Enable chat input
        messageInput.disabled = false;
        sendButton.disabled = false;

        // Clear previous messages and show empty state
        chatContentArea.innerHTML = `<div class='empty-state'><i class='fas fa-spinner fa-spin'></i> <h3>Memuat pesan...</h3></div>`;
        fetch(`/api/messages/${friend.id}`)
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    renderMessages(data.messages);
                } else {
                    chatContentArea.innerHTML = `<div class='empty-state'><i class='fas fa-comments'></i><h3>Gagal memuat pesan</h3></div>`;
                }
            })
            .catch(() => {
                chatContentArea.innerHTML = `<div class='empty-state'><i class='fas fa-comments'></i><h3>Gagal memuat pesan</h3></div>`;
            });
    }

    function showSuccessMessage(message) {
        const successDiv = document.createElement('div');
        successDiv.className = 'success-message';
        successDiv.textContent = message;
        successDiv.style.display = 'block';
        successDiv.style.position = 'fixed';
        successDiv.style.top = '20px';
        successDiv.style.right = '20px';
        successDiv.style.zIndex = '3000';
        document.body.appendChild(successDiv);

        setTimeout(() => {
            successDiv.remove();
        }, 3000);
    }

    function showErrorMessage(message) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.textContent = message;
        errorDiv.style.display = 'block';
        errorDiv.style.position = 'fixed';
        errorDiv.style.top = '20px';
        errorDiv.style.right = '20px';
        errorDiv.style.zIndex = '3000';
        document.body.appendChild(errorDiv);

        setTimeout(() => {
            errorDiv.remove();
        }, 3000);
    }
});
</script>
@endguest
@endsection
