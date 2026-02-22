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

    // Add event lestiners for buttons
    if (editBtn && cancleBtn) {
        editBtn.addEventListener('click', showForm);
        cancleBtn.addEventListener('click', hideForm);
    }

    // If there is a validation error, the form will remain visible
    if (document.querySelector('.text-red-600')) {
        showForm();
    }
});
