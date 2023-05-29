const myProfileBtn = document.getElementById('myProfileBtn');

myProfileBtn.addEventListener('click', () => {
    const infosList = document.getElementById('infosList');
    const icone = document.querySelectorAll('.icone');
    const myProfileText = document.getElementById('myProfileText');

    icone.forEach((icon, index) => {
        icon.classList.toggle('active');
        if (index === 1) {
            icon.classList.toggle('rotate');
        }
    });
    myProfileText.classList.toggle('active');
    infosList.classList.toggle('active');
});


const channelsListItems = document.querySelectorAll('.channel-list__item');

channelsListItems.forEach((channelListItem) => {
  channelListItem.addEventListener('click', () => {
    if (!channelListItem.classList.contains('active')) {
      channelsListItems.forEach((item) => {
        item.classList.remove('active');
      });
      channelListItem.classList.add('active');
    }
  });
});

// Ativar o item "#Serviços Gerais" inicialmente
const defaultActiveItem = document.querySelector('.channel-list__item.active');
defaultActiveItem.classList.add('active');
