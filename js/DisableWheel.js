export function DisableWheel()
{
    document.addEventListener('wheel', function(e) {
        e.preventDefault();
        // e.stopPropagation();
        let scale, tx, ty, box;
        if (e.ctrlKey) {
            var s = Math.exp(-e.deltaY / 100);
            scale *= s;
        } else {
            var direction = 1; //natural.checked ? -1 : 1;
            tx += e.deltaX * direction;
            ty += e.deltaY * direction;
        }
    }, {
        passive: false // Add this
    });
}