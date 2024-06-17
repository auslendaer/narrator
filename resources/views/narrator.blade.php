<div>
    <title>Narrator</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>

    <div id="camera" style="width:320; height:240;"></div>

    <button id="button" onclick="play()" disabled="true">Wait for it</button>

    <audio id="audio"></audio>

    <script language="JavaScript">
        Webcam.set({
            dest_width: 240,
            dest_height: 180
        });
        Webcam.attach( '#camera' );
        Webcam.on('live', async function() {
            // wait the camera balances the light
            // await new Promise(r => setTimeout(r, 100));
            await sleep(100);
            narrate();
        });
        audio.addEventListener('ended', function() {
            narrate();
        } );
        async function play() {
            try {
                await document.getElementById('audio').play();
                // stops here if user is not activated yet
                var button = document.getElementById('button');
                button.innerHTML="Pause";
                button.onclick=pause;
            } catch (error) {
                document.getElementById('button').disabled=false;
                pause();
            }
        }
        async function pause() {
            await document.getElementById('audio').pause();
            var button = document.getElementById('button');
            button.innerHTML="Play";
            button.onclick=play;
        }
        function narrate() {
            Webcam.snap( function(data_uri) {
                Webcam.upload( data_uri, "{{ route('narrate') }}", async function(code, text) {
                    // Upload complete!
                    // 'code' will be the HTTP response code from the server, e.g. 200
                    // 'text' will be the raw response content
                    document.getElementById('audio').src="storage/audio.wav";
                    play();
                } );
            } );
        }

        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }

    </script>
    
</div>