// Admin Dashboard System
class AdminDashboard {
    constructor() {
        this.isAdmin = false;
        this.currentUser = null;
    }

    // Initialize admin dashboard
    init() {
        this.checkAdminStatus();
        this.setupEventListeners();
        this.loadDashboardData();
    }

    // Check if user is admin
    checkAdminStatus() {
        // This would typically check against your backend
        this.isAdmin = localStorage.getItem('isAdmin') === 'true';
        this.currentUser = localStorage.getItem('currentUser');
        
        if (!this.isAdmin) {
            window.location.href = '/login';
        }
    }

    // Setup event listeners
    setupEventListeners() {
        // Content management
        document.querySelector('.add-content-btn')?.addEventListener('click', () => this.showAddContentModal());
        document.querySelector('.edit-content-btn')?.addEventListener('click', () => this.showEditContentModal());
        document.querySelector('.delete-content-btn')?.addEventListener('click', () => this.showDeleteContentModal());

        // User management
        document.querySelector('.add-user-btn')?.addEventListener('click', () => this.showAddUserModal());
        document.querySelector('.edit-user-btn')?.addEventListener('click', () => this.showEditUserModal());
        document.querySelector('.delete-user-btn')?.addEventListener('click', () => this.showDeleteUserModal());

        // Game management
        document.querySelector('.add-game-btn')?.addEventListener('click', () => this.showAddGameModal());
        document.querySelector('.edit-game-btn')?.addEventListener('click', () => this.showEditGameModal());
        document.querySelector('.delete-game-btn')?.addEventListener('click', () => this.showDeleteGameModal());
    }

    // Load dashboard data
    loadDashboardData() {
        this.loadUserStats();
        this.loadGameStats();
        this.loadContentStats();
    }

    // User Statistics
    loadUserStats() {
        const userStats = document.querySelector('.user-stats');
        if (!userStats) return;

        // This would typically fetch from your backend
        const stats = {
            totalUsers: 100,
            activeUsers: 75,
            newUsers: 10
        };

        userStats.innerHTML = `
            <div class="stat-card">
                <h3>Total Users</h3>
                <p>${stats.totalUsers}</p>
            </div>
            <div class="stat-card">
                <h3>Active Users</h3>
                <p>${stats.activeUsers}</p>
            </div>
            <div class="stat-card">
                <h3>New Users</h3>
                <p>${stats.newUsers}</p>
            </div>
        `;
    }

    // Game Statistics
    loadGameStats() {
        const gameStats = document.querySelector('.game-stats');
        if (!gameStats) return;

        // This would typically fetch from your backend
        const stats = {
            totalGames: 4,
            activeGames: 4,
            totalPlays: 500
        };

        gameStats.innerHTML = `
            <div class="stat-card">
                <h3>Total Games</h3>
                <p>${stats.totalGames}</p>
            </div>
            <div class="stat-card">
                <h3>Active Games</h3>
                <p>${stats.activeGames}</p>
            </div>
            <div class="stat-card">
                <h3>Total Plays</h3>
                <p>${stats.totalPlays}</p>
            </div>
        `;
    }

    // Content Statistics
    loadContentStats() {
        const contentStats = document.querySelector('.content-stats');
        if (!contentStats) return;

        // This would typically fetch from your backend
        const stats = {
            totalContent: 50,
            publishedContent: 45,
            draftContent: 5
        };

        contentStats.innerHTML = `
            <div class="stat-card">
                <h3>Total Content</h3>
                <p>${stats.totalContent}</p>
            </div>
            <div class="stat-card">
                <h3>Published</h3>
                <p>${stats.publishedContent}</p>
            </div>
            <div class="stat-card">
                <h3>Drafts</h3>
                <p>${stats.draftContent}</p>
            </div>
        `;
    }

    // Modal Functions
    showAddContentModal() {
        // Implementation for adding content
    }

    showEditContentModal() {
        // Implementation for editing content
    }

    showDeleteContentModal() {
        // Implementation for deleting content
    }

    showAddUserModal() {
        // Implementation for adding users
    }

    showEditUserModal() {
        // Implementation for editing users
    }

    showDeleteUserModal() {
        // Implementation for deleting users
    }

    showAddGameModal() {
        // Implementation for adding games
    }

    showEditGameModal() {
        // Implementation for editing games
    }

    showDeleteGameModal() {
        // Implementation for deleting games
    }
}

// Initialize admin dashboard when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    const adminDashboard = new AdminDashboard();
    adminDashboard.init();
}); 