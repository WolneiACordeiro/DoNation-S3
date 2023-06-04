const imgsComunitys = document.querySelectorAll('.img-comunity');

imgsComunitys.forEach(imgComunity => {
    imgComunity.addEventListener('click', () => {
        imgsComunitys.forEach(img => {
            img.classList.remove('selected');
        })

        imgComunity.classList.add('selected');
    });
});