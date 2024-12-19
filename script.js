/*Cover*/
document.getElementById('open-invitation-btn').addEventListener('click', bukaUndangan);

function bukaUndangan() {
    const cover = document.querySelector('.cover');
    const content = document.querySelector('.content');
    const audio = document.getElementById('audioPlayer');

    // audio.play();
    cover.classList.add('slide-up');
    
    setTimeout(() => {
        cover.style.display = 'none';
        content.style.display = 'block';
    }, 1000);

    if (content.style.display === 'block') {
      content.style.display = 'none';
    } else {
      content.style.display = 'block';
      
      if (content.style.display === 'block') {
          audio.play();
      }
  }
}

const audioPlayer = document.getElementById('audioPlayer');
const playButton = document.getElementById('playButton');
const playIcon = playButton.querySelector('i');

// Funtion buat Play atau Stop lagu
function toggleMusic() {
    if (audioPlayer.paused) {
        audioPlayer.play();
        playIcon.classList.remove('fa-volume-high');
        playIcon.classList.add('fa-volume-xmark');
    } else {
        audioPlayer.pause();
        playIcon.classList.add('fa-volume-high');
        playIcon.classList.remove('fa-volume-xmark');
    }
}

function openPopup() {
  document.getElementById('popupOverlay').style.display = 'flex';
}

function closePopup() {
  document.getElementById('popupOverlay').style.display = 'none';
}

//RSVP
function openModal() {
    document.getElementById('modalOverlay').classList.add('active');
}

function closeModal() {
    document.getElementById('modalOverlay').classList.remove('active');
}

const storyTrack = document.querySelector('.story-track');
const slides = document.querySelectorAll('.story-slide');
const prevButton = document.querySelector('.prev-button');
const nextButton = document.querySelector('.next-button');

let currentIndex = 0;

function updateSlidePosition() {
    const offset = -currentIndex * 100;
    storyTrack.style.transform = `translateX(${offset}%)`;
}

prevButton.addEventListener('click', () => {
    currentIndex--;
    if (currentIndex < 0) {
        currentIndex = slides.length - 1; 
    }
    updateSlidePosition();
});

nextButton.addEventListener('click', () => {
    currentIndex++;
    if (currentIndex >= slides.length) {
        currentIndex = 0; 
    }
    updateSlidePosition();
});


function copyText() {
  var rekeningText = document.getElementById("rekeningText").innerText;
  
  var tempInput = document.createElement("input");
  tempInput.value = rekeningText;
  document.body.appendChild(tempInput);
  
  tempInput.select();
  tempInput.setSelectionRange(0, 99999);
  
  // Salin teks
  document.execCommand("copy");
  
  // Hapus elemen input sementara
  document.body.removeChild(tempInput);

  alert("Nomor rekening berhasil disalin: " + rekeningText);
}

const form = document.getElementById('messageForm');
const notification = document.getElementById('notification');

// Tambahkan event listener untuk submit form
form.addEventListener('submit', function(event) {
    event.preventDefault();
    notification.style.display = 'block';
    form.reset();
    setTimeout(() => {
        notification.style.display = 'none';
    }, 3000);
});

