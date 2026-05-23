/**
 * API Client for Biyahero
 * Handles communication with PHP backend
 */

// Use absolute path from web root for reliability
const API_BASE = '/biyaheroguide/biyahero/api';

const ApiClient = {
    // Authentication
    async register(email, password, firstName, lastName) {
        try {
            const response = await fetch(`${API_BASE}/auth.php?action=register`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ email, password, firstName, lastName })
            });
            const data = await response.json();
            if (data.success) {
                localStorage.setItem('biyahero_session_token', data.data.sessionToken);
                localStorage.setItem('biyahero_user_email', data.data.email);
                localStorage.setItem('biyahero_user_id', data.data.userId);
            }
            return data;
        } catch (error) {
            console.error('Registration error:', error);
            return { success: false, message: 'Network error' };
        }
    },

    async login(email, password) {
        try {
            const url = `${API_BASE}/auth.php?action=login`;
            console.log('Attempting login to:', url);
            const response = await fetch(url, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ email, password })
            });
            console.log('Response status:', response.status);
            const data = await response.json();
            console.log('Response data:', data);
            if (data.success) {
                localStorage.setItem('biyahero_session_token', data.data.sessionToken);
                localStorage.setItem('biyahero_user_email', data.data.email);
                localStorage.setItem('biyahero_user_id', data.data.userId);
            }
            return data;
        } catch (error) {
            console.error('Login error:', error);
            return { success: false, message: 'Network error: ' + error.message };
        }
    },

    async verifySession() {
        const token = localStorage.getItem('biyahero_session_token');
        if (!token) return { success: false };
        
        try {
            const response = await fetch(`${API_BASE}/auth.php?action=verify`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ sessionToken: token })
            });
            return await response.json();
        } catch (error) {
            console.error('Session verification error:', error);
            return { success: false };
        }
    },

    async logout() {
        const token = localStorage.getItem('biyahero_session_token');
        if (!token) return { success: true };
        
        try {
            await fetch(`${API_BASE}/auth.php?action=logout`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ sessionToken: token })
            });
        } catch (error) {
            console.error('Logout error:', error);
        }
        
        localStorage.removeItem('biyahero_session_token');
        localStorage.removeItem('biyahero_user_email');
        localStorage.removeItem('biyahero_user_id');
        return { success: true };
    },

    // Subscription
    async getSubscriptionStatus() {
        const token = localStorage.getItem('biyahero_session_token');
        if (!token) return null;
        
        try {
            const response = await fetch(`${API_BASE}/subscription.php?action=status`, {
                method: 'GET',
                headers: { 'Authorization': `Bearer ${token}` }
            });
            const data = await response.json();
            return data.success ? data.data : null;
        } catch (error) {
            console.error('Subscription status error:', error);
            return null;
        }
    },

    async activateTrial(plan = 'premium') {
        const token = localStorage.getItem('biyahero_session_token');
        if (!token) return { success: false, message: 'Not logged in' };
        
        try {
            const response = await fetch(`${API_BASE}/subscription.php?action=activate_trial`, {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify({ plan })
            });
            return await response.json();
        } catch (error) {
            console.error('Trial activation error:', error);
            return { success: false, message: 'Network error' };
        }
    },

    async processPayment(plan, amount) {
        const token = localStorage.getItem('biyahero_session_token');
        if (!token) return { success: false, message: 'Not logged in' };
        
        try {
            const response = await fetch(`${API_BASE}/subscription.php?action=payment`, {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify({ plan, amount })
            });
            return await response.json();
        } catch (error) {
            console.error('Payment error:', error);
            return { success: false, message: 'Network error' };
        }
    },

    async incrementFareCalc() {
        const token = localStorage.getItem('biyahero_session_token');
        if (!token) return;
        
        try {
            await fetch(`${API_BASE}/subscription.php?action=increment_fare_calc`, {
                method: 'POST',
                headers: { 'Authorization': `Bearer ${token}` }
            });
        } catch (error) {
            console.error('Increment fare calc error:', error);
        }
    },

    async incrementAdCount() {
        const token = localStorage.getItem('biyahero_session_token');
        if (!token) return;
        
        try {
            await fetch(`${API_BASE}/subscription.php?action=increment_ad_count`, {
                method: 'POST',
                headers: { 'Authorization': `Bearer ${token}` }
            });
        } catch (error) {
            console.error('Increment ad count error:', error);
        }
    },

    async getFareRoutes() {
        try {
            const response = await fetch(`${API_BASE}/subscription.php?action=fare_routes`, {
                method: 'GET'
            });
            const data = await response.json();
            return data.success ? data.data : [];
        } catch (error) {
            console.error('Get fare routes error:', error);
            return [];
        }
    },

    // Helper to get current user email
    getCurrentUserEmail() {
        return localStorage.getItem('biyahero_user_email') || null;
    },

    // Helper to check if user is logged in
    isLoggedIn() {
        return !!localStorage.getItem('biyahero_session_token');
    }
};
