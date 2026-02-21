import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const editBtn = document.getElementById('show-edit-form');
    const cancleBtn = document.getElementById('hide-edit-form');
    const infoDiv = document.getElementById('profile-info');
    const editSection = document.getElementById('edit-bio-section');

    if (editBtn && cancleBtn) {
        editBtn.addEventListener('click', () => {
            infoDiv.classList.add('hidden');
            editSection.classList.remove('hidden');
        });

        cancleBtn.addEventListener('click', () => {
            infoDiv.classList.remove('hidden');
            editSection.classList.add('hidden');
        });
    }
});
