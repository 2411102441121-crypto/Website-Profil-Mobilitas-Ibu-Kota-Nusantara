document.addEventListener('DOMContentLoaded', function () {

    /* ========================================
       GLOSARIUM
    ======================================== */

    document.querySelectorAll('.glossary-button').forEach(function (button) {
        button.addEventListener('click', function () {

            const item = button.closest('.glossary-item');
            if (!item) return;

            const isOpen = item.classList.contains('active');

            document.querySelectorAll('.glossary-item').forEach(function (other) {
                other.classList.remove('active');

                const otherButton = other.querySelector('.glossary-button');

                if (otherButton) {
                    otherButton.setAttribute('aria-expanded', 'false');
                }
            });

            if (!isOpen) {
                item.classList.add('active');
                button.setAttribute('aria-expanded', 'true');
            }

        });
    });


    /* ========================================
       DATA STRUKTUR DARI PHP / DATABASE
    ======================================== */

    const strukturData = window.strukturData || {};


    /* ========================================
       POPUP DIREKTUR / DEPUTI
    ======================================== */

    const directorButtons = document.querySelectorAll('.director-popup-btn');
    const directorModal = document.getElementById('directorModal');
    const directorModalClose = document.getElementById('directorModalClose');
    const directorModalOverlay = document.getElementById('directorModalOverlay');

    const directorName = document.getElementById('directorName');
    const directorPosition = document.getElementById('directorPosition');
    const directorAbout = document.getElementById('directorAbout');
    const directorTasks = document.getElementById('directorTasks');


    directorButtons.forEach(function (button) {

        button.addEventListener('click', function () {

            const key = button.getAttribute('data-director');

            const data = strukturData[key];

            if (!data || !directorModal) {
                console.warn('Data struktur tidak ditemukan:', key);
                return;
            }

            directorName.textContent = data.name || '';
            directorPosition.textContent = data.position || '';
            directorAbout.textContent = data.about || '';

            directorTasks.innerHTML = '';

            if (Array.isArray(data.tasks)) {

                data.tasks.forEach(function (task) {

                    const li = document.createElement('li');
                    li.textContent = task;
                    directorTasks.appendChild(li);

                });

            }

            directorModal.classList.add('active');
            document.body.style.overflow = 'hidden';

        });

    });


    /* ========================================
       TUTUP POPUP
    ======================================== */

    function closeDirectorModal() {

        if (!directorModal) return;

        directorModal.classList.remove('active');
        document.body.style.overflow = '';

    }


    if (directorModalClose) {

        directorModalClose.addEventListener('click', function () {
            closeDirectorModal();
        });

    }


    if (directorModalOverlay) {

        directorModalOverlay.addEventListener('click', function () {
            closeDirectorModal();
        });

    }


    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {
            closeDirectorModal();
        }

    });

});