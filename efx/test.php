<?
  $url = (isset($_GET['i']) && $_GET['i'] && strlen($_GET['i']) > 5) ? str_replace('https:/', 'https://', $_GET['i']) : 'https://jsbot.cantelope.org/uploads/1cUypu.mp4';
?>
<!DOCTYPE html>
<html>
  <head>
	  <style>
      body, html{
        margin: 0;
        width: 100%;
        height: 100vh;
        overflow: hidden;
        background: #000;
      }
      #c{
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        height: 100%;
        background: url(138BkZ.jpg);
        background-position: center center;
        background-size: fill;
        transform: translate(-50%, -50%);
      }
      .playButton{
        border: none;
				font-family: courier;
				color: #fff;
				background: #4f86;
				border-radius: 10px;
				width: 100px;
				font-size: 24px;
        z-index: 100;
        cursor: pointer;
				position: absolute;
				left: 50%;
				top: 50%;
				transform: translate(-50%, -50%);
      }
  </style>
	</head>
  <body>
	  <button onclick="hideButton()"  class="playButton">play</button>
	  <canvas id=c></canvas>
	  <script>
      hideButton=()=>{
        document.querySelectorAll('.playButton')[0].style.display='none'
				launch()
      }
			launch=()=>{
      c=document.querySelector('#c')
      c=document.querySelector('#c')
      x=c.getContext('2d')
      S=Math.sin
      C=Math.cos
      t=playing=0
      rsz=window.onresize=()=>{
        setTimeout(()=>{
          if(document.body.clientWidth > document.body.clientHeight*1.77777778){
            c.style.height = '100vh'
            setTimeout(()=>c.style.width = c.clientHeight*1.77777778+'px',0)
          }else{
            c.style.width = '100vw'
            setTimeout(()=>c.style.height = c.clientWidth/1.77777778 + 'px',0)
          }
          //c.width=1920
          //c.height=c.width/1.777777778
        },0)
      }
      rsz()

      Draw=()=>{
        if(!t){
          tc = document.createElement('canvas')
          c.width = 1920/4|0
          c.height = 1080/4|0
          tc.width = c.width
          tc.height = c.height
          tcx = tc.getContext('2d')
          if(
            srcurl.toLowerCase().indexOf('.mp4') !== -1 ||
            srcurl.toLowerCase().indexOf('.webm') !== -1 ||
            srcurl.toLowerCase().indexOf('.mov') !== -1){
            src=[false, document.createElement('video')]
            src[1].oncanplay=()=>{
              src[0]=true
              src[1].loop = true
              //src[1].muted = true
              src[1].play()
            }
          }
          src[1].src="/proxy.php/?url=<?=$url?>"
        }
      
        if(src[0]){
          tcx.drawImage(src[1],0,0,c.width,c.height)
          d1 = tcx.getImageData(0,0,tc.width,tc.height)
          d2 = tcx.getImageData(0,0,tc.width,tc.height)
          for(ct=i=0;i<d2.data.length;i+=4){
            a=d1.data
            j=i/4|0
            X=j%c.width
            Y=j/c.width|0
            d=Math.hypot(c.width/2-X,c.height/2-Y)
            p=Math.atan2(c.width/2-X,c.height/2-Y)
            s=15//(1+d/2000)
            tx=X+S(q=p)*(m=(1+S(d/(30+S(t)*25)-t*20)/2)*s*Math.min(1,d/100))
            ty=Y+C(q)*m
            n=((ty|0)*c.width+(tx|0))*4
            a[i+0] = d2.data[n+0]
            a[i+1] = d2.data[n+1]
            a[i+2] = d2.data[n+2]
            a[i+3] = 255
            ct++
          }
          x.putImageData(d1,0,0)
        }

      t+=1/60
      requestAnimationFrame(Draw)
    }

    Draw()
  }
  let srcurl = "<?=$url?>"
  if(
    srcurl.toLowerCase().indexOf('.jpg') !== -1 ||
    srcurl.toLowerCase().indexOf('.jpeg') !== -1 ||
    srcurl.toLowerCase().indexOf('.bmp') !== -1 ||
    srcurl.toLowerCase().indexOf('.tiff') !== -1 ||
    srcurl.toLowerCase().indexOf('.png') !== -1 ||
    srcurl.toLowerCase().indexOf('.gif') !== -1 ||
    srcurl.toLowerCase().indexOf('.ico') !== -1 ||
    srcurl.toLowerCase().indexOf('.apng') !== -1 ||
    srcurl.toLowerCase().indexOf('.svg') !== -1){
    src=[false, new Image()]
    src[1].onload=()=>{
      src[0]=true
    }
    hideButton()
  }
</script>
	</body>
</html>
