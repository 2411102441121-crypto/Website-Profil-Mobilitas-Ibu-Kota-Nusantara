document.querySelectorAll('.glossary-button').forEach(function (button) {
    button.addEventListener('click', function () {
        const item = button.closest('.glossary-item');
        const isOpen = item.classList.contains('active');

        document.querySelectorAll('.glossary-item').forEach(function (other) {
            other.classList.remove('active');
            const otherButton = other.querySelector('.glossary-button');
            if (otherButton) otherButton.setAttribute('aria-expanded', 'false');
        });

        if (!isOpen) {
            item.classList.add('active');
            button.setAttribute('aria-expanded', 'true');
        }
    });
});
