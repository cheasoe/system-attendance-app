<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modern Registration Form</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          fontFamily: {
            sans: ['Plus Jakarta Sans', 'sans-serif'],
          },
          animation: {
            'blob': 'blob 7s infinite',
            'float': 'float 6s ease-in-out infinite',
            'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
          },
          keyframes: {
            blob: {
              '0%': { transform: 'translate(0px, 0px) scale(1)' },
              '33%': { transform: 'translate(30px, -50px) scale(1.1)' },
              '66%': { transform: 'translate(-20px, 20px) scale(0.9)' },
              '100%': { transform: 'translate(0px, 0px) scale(1)' },
            },
            float: {
              '0%, 100%': { transform: 'translateY(0px)' },
              '50%': { transform: 'translateY(-10px)' },
            }
          }
        }
      }
    }
  </script>
  <style>
    /* Custom Glassmorphism Effect */
    .glass-card {
      background: rgba(255, 255, 255, 0.7);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border: 1px solid rgba(255, 255, 255, 0.4);
    }
    .dark .glass-card {
      background: rgba(18, 24, 38, 0.75);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border: 1px solid rgba(255, 255, 255, 0.08);
    }
    
    .glass-input {
      background: rgba(255, 255, 255, 0.6);
      border: 1px solid rgba(209, 213, 219, 0.6);
      transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .dark .glass-input {
      background: rgba(15, 23, 42, 0.5);
      border: 1px solid rgba(255, 255, 255, 0.1);
      color: #f3f4f6;
    }
    
    .glass-input:focus {
      outline: none;
      border-color: #6366f1;
      box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15);
    }
    .dark .glass-input:focus {
      border-color: #818cf8;
      box-shadow: 0 0 0 4px rgba(129, 140, 248, 0.2);
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
      width: 6px;
    }
    ::-webkit-scrollbar-track {
      background: transparent;
    }
    ::-webkit-scrollbar-thumb {
      background: rgba(156, 163, 175, 0.4);
      border-radius: 9999px;
    }
  </style>
</head>
<body class="font-sans antialiased text-slate-800 dark:text-slate-100 min-h-screen transition-colors duration-500 overflow-x-hidden selection:bg-indigo-500 selection:text-white bg-slate-50 dark:bg-slate-950 flex items-center justify-center p-4 sm:p-6 lg:p-8">

  <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">
    <!-- Light mode ambient shapes -->
    <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] rounded-full bg-indigo-300/40 dark:bg-indigo-900/30 blur-[100px] animate-blob"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[500px] h-[500px] rounded-full bg-purple-300/40 dark:bg-purple-900/30 blur-[100px] animate-blob animation-delay-2000"></div>
    <div class="absolute top-[40%] right-[30%] w-[350px] h-[350px] rounded-full bg-pink-300/30 dark:bg-pink-900/20 blur-[100px] animate-blob animation-delay-4000"></div>
  </div>

  <!-- Theme Toggle Floating Button -->
  <button id="themeToggle" class="fixed top-5 right-5 p-3 rounded-2xl glass-card text-slate-700 dark:text-slate-200 hover:scale-105 active:scale-95 transition-all duration-300 shadow-lg z-50 focus:outline-none" aria-label="Toggle Theme">
    <!-- Sun Icon -->
    <svg id="sunIcon" class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
    </svg>
    <!-- Moon Icon -->
    <svg id="moonIcon" class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
    </svg>
  </button>

  <main class="w-full max-w-md my-auto">
    <!-- Card Container -->
    <div id="formContainer" class="glass-card rounded-3xl p-6 sm:p-8 shadow-2xl transition-all duration-500 relative overflow-hidden">
      
      <!-- Brand Header -->
      <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-gradient-to-tr from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/30 mb-4 animate-float">
          <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
          </svg>
        </div>
        <h1 class="text-2xl sm:text-3xl font-bold bg-gradient-to-r from-slate-900 via-indigo-950 to-slate-800 dark:from-white dark:via-slate-100 dark:to-indigo-200 bg-clip-text text-transparent">
          Create Account
        </h1>
        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Join thousands of creators managing projects today.</p>
      </div>

      <div class="grid grid-cols-3 gap-3 mb-6">
        <button class="flex items-center justify-center p-3 rounded-xl glass-input hover:bg-slate-100/80 dark:hover:bg-slate-800/50 transition-all duration-200 group">
          <svg class="w-5 h-5 group-hover:scale-110 transition-transform" viewBox="0 0 24 24">
            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
          </svg>
        </button>
        <button class="flex items-center justify-center p-3 rounded-xl glass-input hover:bg-slate-100/80 dark:hover:bg-slate-800/50 transition-all duration-200 group">
          <svg class="w-5 h-5 fill-current text-slate-800 dark:text-white group-hover:scale-110 transition-transform" viewBox="0 0 24 24">
            <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/>
          </svg>
        </button>
        <button class="flex items-center justify-center p-3 rounded-xl glass-input hover:bg-slate-100/80 dark:hover:bg-slate-800/50 transition-all duration-200 group">
          <svg class="w-5 h-5 fill-current text-slate-800 dark:text-white group-hover:scale-110 transition-transform" viewBox="0 0 24 24">
            <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M15.97 6.85c.66-.8 1.11-1.92.99-3.04-.96.04-2.13.64-2.82 1.44-.61.71-1.15 1.86-1.01 2.96 1.08.08 2.18-.55 2.84-1.36z"/>
          </svg>
        </button>
      </div>

      <div class="relative flex py-2 items-center mb-6">
        <div class="flex-grow border-t border-slate-300 dark:border-slate-800"></div>
        <span class="flex-shrink mx-4 text-xs font-semibold tracking-wider text-slate-400 uppercase">Or continue with</span>
        <div class="flex-grow border-t border-slate-300 dark:border-slate-800"></div>
      </div>

      <form id="registerForm" class="space-y-4" novalidate>
        
        <!-- Name Field -->
        <div>
          <label for="fullName" class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-1.5">Full Name</label>
          <div class="relative">
            <input type="text" id="fullName" placeholder="John Doe" class="glass-input w-full px-4 py-3 rounded-xl text-sm transition-all pr-10" autocomplete="name" required>
            <!-- Status Icon -->
            <div id="nameStatus" class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none opacity-0 transition-opacity">
              <svg class="w-5 h-5 text-emerald-500 valid-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
              <svg class="w-5 h-5 text-rose-500 invalid-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </div>
          </div>
          <p id="nameError" class="text-xs text-rose-500 mt-1 hidden transition-all"></p>
        </div>

        <!-- Email Field -->
        <div>
          <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-1.5">Email Address</label>
          <div class="relative">
            <input type="email" id="email" placeholder="john@example.com" class="glass-input w-full px-4 py-3 rounded-xl text-sm transition-all pr-10" autocomplete="email" required>
            <div id="emailStatus" class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none opacity-0 transition-opacity">
              <svg class="w-5 h-5 text-emerald-500 valid-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
              <svg class="w-5 h-5 text-rose-500 invalid-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </div>
          </div>
          <p id="emailError" class="text-xs text-rose-500 mt-1 hidden transition-all"></p>
        </div>

        <!-- Password Field -->
        <div>
          <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-1.5">Password</label>
          <div class="relative">
            <input type="password" id="password" placeholder="••••••••" class="glass-input w-full px-4 py-3 rounded-xl text-sm transition-all pr-10" autocomplete="new-password" required>
            <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 focus:outline-none">
              <!-- Eye open -->
              <svg id="eyeOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
              <!-- Eye closed -->
              <svg id="eyeClosed" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858-5.908a10.033 10.033 0 013.122-.463c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21M3 3l18 18"></path></svg>
            </button>
          </div>
          
          <div class="mt-2 space-y-1">
            <div class="flex h-1.5 w-full bg-slate-200 dark:bg-slate-800 rounded-full overflow-hidden">
              <div id="strengthMeter" class="h-full w-0 transition-all duration-300 rounded-full bg-rose-500"></div>
            </div>
            <div class="flex justify-between items-center text-[10px] text-slate-400 font-medium">
              <span>Strength: <strong id="strengthLabel" class="text-slate-500 dark:text-slate-400">None</strong></span>
              <span id="strengthAdvice" class="text-slate-400">Min. 8 chars</span>
            </div>
          </div>
        </div>

        <!-- Confirm Password Field -->
        <div>
          <label for="confirmPassword" class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-1.5">Confirm Password</label>
          <div class="relative">
            <input type="password" id="confirmPassword" placeholder="••••••••" class="glass-input w-full px-4 py-3 rounded-xl text-sm transition-all pr-10" autocomplete="new-password" required>
            <div id="confirmStatus" class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none opacity-0 transition-opacity">
              <svg class="w-5 h-5 text-emerald-500 valid-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
              <svg class="w-5 h-5 text-rose-500 invalid-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </div>
          </div>
          <p id="confirmError" class="text-xs text-rose-500 mt-1 hidden transition-all"></p>
        </div>

        <!-- Terms Agreement -->
        <div class="flex items-center space-x-2 pt-1">
          <input type="checkbox" id="terms" class="w-4 h-4 rounded text-indigo-600 focus:ring-indigo-500 border-slate-300 dark:border-slate-700 bg-slate-100 dark:bg-slate-900" required>
          <label for="terms" class="text-xs text-slate-600 dark:text-slate-400">
            I agree to the <a href="#" class="text-indigo-600 dark:text-indigo-400 underline hover:text-indigo-500">Terms of Service</a> and <a href="#" class="text-indigo-600 dark:text-indigo-400 underline hover:text-indigo-500">Privacy Policy</a>
          </label>
        </div>

        <!-- Submit Button -->
        <button type="submit" id="submitBtn" class="w-full mt-4 py-3.5 px-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white font-semibold rounded-xl shadow-lg shadow-indigo-500/25 hover:shadow-indigo-500/40 active:scale-[0.99] transition-all duration-200 flex items-center justify-center space-x-2 disabled:opacity-50 disabled:cursor-not-allowed">
          <span>Create Account</span>
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </button>
      </form>

      <!-- Footer Link -->
      <div class="mt-6 text-center text-xs text-slate-500 dark:text-slate-400">
        Already have an account? 
        <a href="#" class="font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">Sign in</a>
      </div>
    </div>

    <div id="successCard" class="glass-card rounded-3xl p-8 shadow-2xl text-center hidden transform scale-95 opacity-0 transition-all duration-500">
      <div class="w-20 h-20 bg-emerald-500/10 text-emerald-500 rounded-full flex items-center justify-center mx-auto mb-6 animate-bounce">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
      </div>
      <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">Welcome Aboard!</h2>
      <p class="text-slate-500 dark:text-slate-400 text-sm mb-6">Your account has been successfully created. We've sent a confirmation email to <span id="confirmedEmail" class="font-medium text-slate-800 dark:text-slate-200"></span>.</p>
      
      <button id="resetFormBtn" class="w-full py-3 px-4 bg-slate-900 dark:bg-slate-100 text-white dark:text-slate-900 font-semibold rounded-xl hover:opacity-90 transition-opacity">
        Back to Registration
      </button>
    </div>
  </main>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Elements
      const themeToggle = document.getElementById('themeToggle');
      const form = document.getElementById('registerForm');
      const formContainer = document.getElementById('formContainer');
      const successCard = document.getElementById('successCard');
      const confirmedEmail = document.getElementById('confirmedEmail');
      const resetFormBtn = document.getElementById('resetFormBtn');

      // Inputs
      const fullName = document.getElementById('fullName');
      const email = document.getElementById('email');
      const password = document.getElementById('password');
      const confirmPassword = document.getElementById('confirmPassword');
      const togglePassword = document.getElementById('togglePassword');
      const eyeOpen = document.getElementById('eyeOpen');
      const eyeClosed = document.getElementById('eyeClosed');

      // Strength UI
      const strengthMeter = document.getElementById('strengthMeter');
      const strengthLabel = document.getElementById('strengthLabel');
      const strengthAdvice = document.getElementById('strengthAdvice');

      // Theme Toggle Implementation
      themeToggle.addEventListener('click', () => {
        document.documentElement.classList.toggle('dark');
      });

      // Toggle Password Visibility
      togglePassword.addEventListener('click', () => {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        confirmPassword.setAttribute('type', type);
        eyeOpen.classList.toggle('hidden');
        eyeClosed.classList.toggle('hidden');
      });

      // Validation Rules & Helpers
      const setValidationStatus = (field, isValid, errorMessage = '') => {
        const statusContainer = document.getElementById(`${field.id}Status`);
        const errorElement = document.getElementById(`${field.id}Error`);
        
        if (!statusContainer) return;

        const validIcon = statusContainer.querySelector('.valid-icon');
        const invalidIcon = statusContainer.querySelector('.invalid-icon');

        statusContainer.classList.remove('opacity-0');
        statusContainer.classList.add('opacity-100');

        if (isValid) {
          field.classList.remove('border-rose-500');
          field.classList.add('border-emerald-500');
          validIcon?.classList.remove('hidden');
          invalidIcon?.classList.add('hidden');
          if (errorElement) errorElement.classList.add('hidden');
        } else {
          field.classList.remove('border-emerald-500');
          field.classList.add('border-rose-500');
          validIcon?.classList.add('hidden');
          invalidIcon?.classList.remove('hidden');
          if (errorElement) {
            errorElement.textContent = errorMessage;
            errorElement.classList.remove('hidden');
          }
        }
      };

      const clearValidationStatus = (field) => {
        const statusContainer = document.getElementById(`${field.id}Status`);
        const errorElement = document.getElementById(`${field.id}Error`);
        if (statusContainer) statusContainer.classList.add('opacity-0');
        if (errorElement) errorElement.classList.add('hidden');
        field.classList.remove('border-rose-500', 'border-emerald-500');
      };

      // Real-time Name Validation
      const validateName = () => {
        const val = fullName.value.trim();
        if (val.length === 0) {
          clearValidationStatus(fullName);
          return false;
        }
        if (val.length < 3) {
          setValidationStatus(fullName, false, 'Name must be at least 3 characters long');
          return false;
        }
        setValidationStatus(fullName, true);
        return true;
      };

      // Real-time Email Validation
      const validateEmail = () => {
        const val = email.value.trim();
        if (val.length === 0) {
          clearValidationStatus(email);
          return false;
        }
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(val)) {
          setValidationStatus(email, false, 'Please enter a valid email address');
          return false;
        }
        setValidationStatus(email, true);
        return true;
      };

      const evaluatePasswordStrength = (pwd) => {
        let score = 0;
        if (!pwd) return { score: 0, label: 'None', color: 'bg-slate-300', advice: 'Min. 8 chars' };

        if (pwd.length >= 8) score += 1;
        if (/[A-Z]/.test(pwd)) score += 1;
        if (/[0-9]/.test(pwd)) score += 1;
        if (/[^A-Za-z0-9]/.test(pwd)) score += 1;

        switch (score) {
          case 1:
            return { score: 25, label: 'Weak', color: 'bg-rose-500', advice: 'Add numbers or symbols' };
          case 2:
            return { score: 50, label: 'Fair', color: 'bg-amber-500', advice: 'Add capital letters' };
          case 3:
            return { score: 75, label: 'Good', color: 'bg-blue-500', advice: 'Almost strong!' };
          case 4:
            return { score: 100, label: 'Strong', color: 'bg-emerald-500', advice: 'Great password!' };
          default:
            return { score: 10, label: 'Very Weak', color: 'bg-rose-500', advice: 'Too short' };
        }
      };

      const validatePassword = () => {
        const val = password.value;
        const result = evaluatePasswordStrength(val);
        
        strengthMeter.style.width = `${result.score}%`;
        strengthMeter.className = `h-full transition-all duration-300 rounded-full ${result.color}`;
        strengthLabel.textContent = result.label;
        strengthAdvice.textContent = result.advice;

        if (confirmPassword.value) validateConfirmPassword();

        return result.score >= 50; // Requires at least Medium strength
      };

      // Confirm Password Validation
      const validateConfirmPassword = () => {
        const val = confirmPassword.value;
        if (val.length === 0) {
          clearValidationStatus(confirmPassword);
          return false;
        }
        if (val !== password.value) {
          setValidationStatus(confirmPassword, false, 'Passwords do not match');
          return false;
        }
        setValidationStatus(confirmPassword, true);
        return true;
      };

      // Attach Event Listeners
      fullName.addEventListener('input', validateName);
      email.addEventListener('input', validateEmail);
      password.addEventListener('input', validatePassword);
      confirmPassword.addEventListener('input', validateConfirmPassword);

      form.addEventListener('submit', (e) => {
        e.preventDefault();

        const isNameValid = validateName();
        const isEmailValid = validateEmail();
        const isPasswordValid = validatePassword();
        const isConfirmValid = validateConfirmPassword();

        if (isNameValid && isEmailValid && isPasswordValid && isConfirmValid) {
          // Display Loading State on Button
          const submitBtn = document.getElementById('submitBtn');
          submitBtn.disabled = true;
          submitBtn.innerHTML = `
            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span>Creating Account...</span>
          `;

          // Simulate API Call delay
          setTimeout(() => {
            confirmedEmail.textContent = email.value;
            
            // Fade out form card
            formContainer.classList.add('opacity-0', 'scale-95');
            
            setTimeout(() => {
              formContainer.classList.add('hidden');
              successCard.classList.remove('hidden');
              
              // Fade in success card
              requestAnimationFrame(() => {
                successCard.classList.remove('opacity-0', 'scale-95');
                successCard.classList.add('opacity-100', 'scale-100');
              });
            }, 300);
          }, 1200);
        }
      });

      // Reset Form State
      resetFormBtn.addEventListener('click', () => {
        form.reset();
        clearValidationStatus(fullName);
        clearValidationStatus(email);
        clearValidationStatus(confirmPassword);
        strengthMeter.style.width = '0%';
        strengthLabel.textContent = 'None';
        strengthAdvice.textContent = 'Min. 8 chars';

        const submitBtn = document.getElementById('submitBtn');
        submitBtn.disabled = false;
        submitBtn.innerHTML = `
          <span>Create Account</span>
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        `;

        successCard.classList.add('opacity-0', 'scale-95');
        setTimeout(() => {
          successCard.classList.add('hidden');
          formContainer.classList.remove('hidden');
          requestAnimationFrame(() => {
            formContainer.classList.remove('opacity-0', 'scale-95');
            formContainer.classList.add('opacity-100', 'scale-100');
          });
        }, 300);
      });
    });
  </script>
</body>
</html>