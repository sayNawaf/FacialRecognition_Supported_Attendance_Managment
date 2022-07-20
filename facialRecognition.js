

const video = document.getElementById('video')
var container = document.getElementById("vidCont");
var detectionsLabel = [];

Promise.all([
    faceapi.nets.faceRecognitionNet.loadFromUri('./models'),
    faceapi.nets.faceLandmark68Net.loadFromUri('./models'),
    faceapi.nets.ssdMobilenetv1.loadFromUri('./models')
  
]).then(startVideo)

function startVideo() {
  navigator.getUserMedia(
    { video: {} },
    stream => video.srcObject = stream,
    err => console.error(err)
  )
}

video.addEventListener('play', async() => {
  
    
    await loadLabeledImages();
    
    
    
})




function loadLabeledImages() {
    
    var xhr = new XMLHttpRequest();

    xhr.open("POST","http://localhost/Varsity/getEmbedding.php",true);
    
    
    var embeddings;
    xhr.onload = function(){
      
        if(this.response == 'f'){
            console.log("error");
        }
        else{
          
            //console.log(this.response);
            var labeledFaceDescriptors = [];
            embeddings = JSON.parse(this.response);
            for(i = 0;i<Object.keys(embeddings).length;i++){
              var arrayEmbeds1 = embeddings[i]["Embedding1"].split(',').map(function(item) {
                  var item = item.replace('"','');
                  return parseFloat(item);
              });
              var arrayEmbeds2 = embeddings[i]["Embedding2"].split(',').map(function(item) {
                  var item = item.replace('"','');
                  return parseFloat(item);
              });
              var arrayEmbeds3 = embeddings[i]["Embedding3"].split(',').map(function(item) {
                  var item = item.replace('"','');
                  return parseFloat(item);
              });
        
              usn = embeddings[i]["usn"];
              name_ = embeddings[i]["name"];
              label = usn +"-"+name_;
              arrayEmbeds1 = new Float32Array(arrayEmbeds1);
              arrayEmbeds2 = new Float32Array(arrayEmbeds2);
              arrayEmbeds3 = new Float32Array(arrayEmbeds3);
              descriptions = [arrayEmbeds1,arrayEmbeds2,arrayEmbeds3];
              labeledFaceDescriptors.push(new faceapi.LabeledFaceDescriptors(label, descriptions));

            }
              const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.6)
    
    
  const canvas = faceapi.createCanvasFromMedia(video)
  
  const displaySize = { width: video.width, height: video.height }
  faceapi.matchDimensions(canvas, displaySize)
  
  setInterval(async () => {
    const detections = await faceapi.detectAllFaces(video).withFaceLandmarks().withFaceDescriptors()
    const resizedDetections = faceapi.resizeResults(detections, displaySize)
    const results = resizedDetections.map(d => faceMatcher.findBestMatch(d.descriptor))
    canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
    results.forEach((result, i) => {
        const box = resizedDetections[i].detection.box
        const drawBox = new faceapi.draw.DrawBox(box, { label: result.toString() })
        result = result.toString().split(' ')[0];
        if(!detectionsLabel.includes(result) && result.toString() != "unknown")
{
  detectionsLabel.push(result);
  sessionStorage.setItem("detected",JSON.stringify(detectionsLabel));
}
        
       
        drawBox.draw(canvas)
      })
    
    
    
  }, 100)
  container.appendChild(canvas);
            
          
                
                
          
    }
        
    }
    xhr.send();
    
    
      
    
  }