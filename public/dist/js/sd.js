const cameraPreview = document.getElementById('camera-preview');
const startCameraButton = document.getElementById('start-camera');
const stopCameraButton = document.getElementById('stop-camera');
const setRatioButton = document.getElementById('set-ratio');
const set9_12RatioButton = document.getElementById('set-9-12-ratio');



let mediaStream;

startCameraButton.addEventListener('click', () => {
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(stream => {
      mediaStream = stream;
      cameraPreview.srcObject = stream;
      startCameraButton.disabled = true;
      stopCameraButton.disabled = false;
      setRatioButton.disabled = false;
    })
    .catch(error => {
      console.error('Error accessing the camera:', error);
    });
});

stopCameraButton.addEventListener('click', () => {
  if (mediaStream) {
    mediaStream.getTracks().forEach(track => track.stop());
    cameraPreview.srcObject = null;
    startCameraButton.disabled = false;
    stopCameraButton.disabled = true;
    setRatioButton.disabled = true;
  }
});

setRatioButton.addEventListener('click', () => {
  cameraPreview.style.width = '640px';
  cameraPreview.style.height = '360px';
});

set9_12RatioButton.addEventListener('click', () => {
  cameraPreview.style.width = '540px';
  cameraPreview.style.height = '720px';
});