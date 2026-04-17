import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const editBtn = document.getElementById('show-edit-form');
    const cancleBtn = document.getElementById('hide-edit-form');
    const infoDiv = document.getElementById('profile-info');
    const editSection = document.getElementById('edit-bio-section');

    // Appear the edit form
    const showForm = () => {
        infoDiv.classList.add('hidden');
        editSection.classList.remove('hidden');
    }

    // Hide the edit form
    const hideForm = () => {
        infoDiv.classList.remove('hidden');
        editSection.classList.add('hidden');
    }

    // Add event lestiners for buttons after validation that the page is correct
    if (editBtn && infoDiv && editSection) {
        editBtn.addEventListener('click', showForm);
        if (cancleBtn) {
            cancleBtn.addEventListener('click', hideForm);
        }
        // If there is a validation error, the form will remain visible
        if (editSection.querySelector('.text-red-600')) {
            showForm();
        }
    }

    const avatarInput = document.getElementById('avatar');
    const preview = document.getElementById('preview');
    const placeholder = document.getElementById('placeholder');

    // Edit avatar
    if (avatarInput && preview) {
        avatarInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    if (placeholder) {
                        placeholder.classList.add('hidden');
                    }
                }
                reader.readAsDataURL(file);
            }
        });
    }

    // Show the Mobile menu
    const menuBtn = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }
});

/**
 * Function to show the Modal.
 * Bind the function to window so that it becomes global and the browser can find it.
 */
window.showModal = function() {
    const modal = document.getElementById('confirmation-modal');
    if (modal) {
        modal.classList.remove('hidden');
    }
}

/**
 * Function to hide the Modal.
 * Bind the function to window so that it becomes global and the browser can find it.
 */
window.hideModal = function() {
    const modal = document.getElementById('confirmation-modal');
    if (modal) {
        modal.classList.add('hidden');
    }
}