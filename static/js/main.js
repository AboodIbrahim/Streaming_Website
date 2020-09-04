var toggler = document.querySelector('.background');

if (localStorage.getItem('darkMode') == 'false' || localStorage.getItem('darkMode') == null){
    document.body.classList.remove('dark')
    toggler.classList.remove('active');
}else{
    document.body.classList.add('dark')
    toggler.classList.add('active');
}

toggler.addEventListener('click', ()=> {
    document.body.classList.toggle('dark')

    if (localStorage.getItem('darkMode') == 'false' || localStorage.getItem('darkMode') == null){
        toggler.classList.add('active');
        localStorage.setItem('darkMode', true);
    }else{
        toggler.classList.remove('active');
        localStorage.setItem('darkMode', false);
    }
});

let buffer = 20;
if(window.innerWidth <= 699){
    buffer = 0;
    let iframe = document.querySelector('iframe');
    iframe.style.height = (iframe.offsetWidth * 9) / 16 + 'px';
}

document.querySelector('.main').style.paddingTop = document.querySelector('nav').offsetHeight + buffer + 'px';

var listItems = document.querySelectorAll('.list ul .item');
listItems[listItems.length-1].style.borderBottom = 'none';

if (description !== '') {
    var showMoreBtn = document.createElement('button');
    showMoreBtn.innerHTML = 'Show more';
    showMoreBtn.setAttribute('class', 'show-more-btn');
    document.querySelector('.info').appendChild(showMoreBtn);

    var descriptionEle = document.querySelector('.description'),
        editedDes = description.split(" ").slice(0, 20).join(" ");

    descriptionEle.innerHTML = editedDes;

    showMoreBtn.addEventListener('click', () => {
        if (descriptionEle.innerHTML == editedDes){
            descriptionEle.innerHTML = description;
            showMoreBtn.innerHTML = 'Show less';
        }
        else{
            descriptionEle.innerHTML = editedDes;
            showMoreBtn.innerHTML = 'Show more';
        }
    });
}

var seriesListToggler = document.querySelector('.list .list-header .toggle-collapse');

seriesListToggler.addEventListener('click', () => {
    document.querySelector('.list').classList.toggle('collapse');
})