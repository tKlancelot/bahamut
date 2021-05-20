export function Activate(element,selector)
{
    let menuItems = document.querySelectorAll(selector);
    menuItems[element].classList.add('active');
}