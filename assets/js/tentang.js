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
       DATA DIREKTUR
    ======================================== */

  const directorData = {
    deputi: {
        name:'Dr. Agung Indrajit, S.T., M.Sc.',
        position:'Deputi Bidang Transformasi Hijau dan Digital',
        about:'Memimpin pelaksanaan transformasi hijau dan transformasi digital dalam mendukung pembangunan Ibu Kota Nusantara.',
        tasks:[
            'Koordinasi pelaksanaan transformasi hijau dan digital.',
            'Perumusan dan pelaksanaan kebijakan di bidang transformasi hijau dan digital.',
            'Pengembangan ekosistem digital dan kota cerdas.',
            'Pemberian bimbingan teknis dan supervisi.'
        ]
    },

    digital: {
        name:'Tonny Agus Setiono, S.Si.T., M.T.',
        position:'Direktur Pengembangan Ekosistem Digital',
        about:'Memimpin pengembangan ekosistem digital untuk mendukung transformasi digital dan penyelenggaraan kota cerdas di Ibu Kota Nusantara.',
        tasks:[
            'Pengembangan ekosistem digital.',
            'Pengembangan dan penyelenggaraan kota cerdas.',
            'Pelaksanaan transformasi digital.',
            'Pengembangan sumber daya manusia di bidang digital.'
        ]
    },

    hijau: {
        name:'Agus Gunawan, S.T., M.Eng.',
        position:'Direktur Transformasi Hijau',
        about:'Memimpin pelaksanaan transformasi hijau untuk mendukung pembangunan Ibu Kota Nusantara yang berkelanjutan.',
        tasks:[
            'Perumusan dan pelaksanaan kebijakan transformasi hijau.',
            'Pengembangan transformasi menuju pembangunan rendah emisi.',
            'Koordinasi pelaksanaan transformasi hijau.',
            'Pemberian bimbingan teknis dan supervisi.'
        ]
    },

    data: {
        name:'Ambar Tri Bawono, S.T., M.Sc.',
        position:'(Plt.) Direktur Data dan Kecerdasan Buatan',
        about:'Memimpin pengelolaan data dan pengembangan kecerdasan buatan untuk mendukung pembangunan kota cerdas di Ibu Kota Nusantara.',
        tasks:[
            'Pengelolaan data dan statistik.',
            'Pengembangan kecerdasan buatan.',
            'Pengelolaan keamanan informasi.',
            'Pengembangan sistem informasi dan teknologi digital.'
        ]
    }
};

    /* ========================================
       POPUP DIREKTUR
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
            const data = directorData[key];

            if (!data || !directorModal) return;

            directorName.textContent = data.name;
            directorPosition.textContent = data.position;
            directorAbout.textContent = data.about;

            directorTasks.innerHTML = '';

            data.tasks.forEach(function (task) {
                const li = document.createElement('li');
                li.textContent = task;
                directorTasks.appendChild(li);
            });

            directorModal.classList.add('active');
            document.body.style.overflow = 'hidden';

        });

    });


    /* ========================================
       TUTUP POPUP
    ======================================== */

    if (directorModalClose) {
        directorModalClose.addEventListener('click', function () {
            directorModal.classList.remove('active');
            document.body.style.overflow = '';
        });
    }

    if (directorModalOverlay) {
        directorModalOverlay.addEventListener('click', function () {
            directorModal.classList.remove('active');
            document.body.style.overflow = '';
        });
    }

    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape' && directorModal) {
            directorModal.classList.remove('active');
            document.body.style.overflow = '';
        }

    });

});