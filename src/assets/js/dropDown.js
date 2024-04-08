const dropdownButtons = document.querySelectorAll('.menu-arrow-btn');

function openCloseDropdown (header, list, state) {
    if(state === "false") {
        header.setAttribute('data-opened', "true");
        list.setAttribute('data-opened', "true");
    } else if (state === "true") {
        header.setAttribute('data-opened', "false");
        list.setAttribute('data-opened', "false");
    }
}

dropdownButtons.forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        const list = e.target.parentNode.nextElementSibling;
        const state = btn.getAttribute('data-opened');
        openCloseDropdown(btn, list, state);
    })
})
