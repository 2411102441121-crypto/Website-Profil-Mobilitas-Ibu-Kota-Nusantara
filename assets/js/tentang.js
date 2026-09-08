document.addEventListener('DOMContentLoaded', function () {

    /* GLOSARIUM */
    document.querySelectorAll('.glossary-button').forEach(function (button) {

        button.addEventListener('click', function () {

            const item = button.closest('.glossary-item');
            const isOpen = item.classList.contains('active');

            document.querySelectorAll('.glossary-item').forEach(function (other) {

                other.classList.remove('active');

                const otherButton = other.querySelector('.glossary-button');
                const otherArrow = other.querySelector('.arrow');

                if (otherButton) {
                    otherButton.setAttribute('aria-expanded', 'false');
                }

                if (otherArrow) {
                    otherArrow.textContent = '⌃';
                }

            });

            if (!isOpen) {

                item.classList.add('active');
                button.setAttribute('aria-expanded', 'true');

                const arrow = button.querySelector('.arrow');

                if (arrow) {
                    arrow.textContent = '⌄';
                }

            }

        });

    });

});