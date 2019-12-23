fetch('http://localhost/project%20web/image.json')
.then(response => response.json())
.then(data => {
    var divImage = document.getElementById('image');
    divImage.innerHTML = data.image;
    var mainImg = document.getElementById('mainImg');
    mainImg.style = 'width: 900px;padding-top: 60px;'
})
.catch(error => console.error(error))



