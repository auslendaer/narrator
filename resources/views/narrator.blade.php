<div>
    <title>Narrator</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>

    <div id="camera" style="width:320; height:240;"></div>

    <button onclick="snapshot()">Snapshot</button>
    <form id="narrate" method="post" action="{{ route('narrate') }}" style="margin-bottom:0px;">
        @csrf
        <input type="hidden" id="data" name="data"/>
    </form>
    
    <div id="snapshot" style="width:320; height:240;"></div>

    <button form="narrate">Narrate</button>

    <div id="previous"><img src="storage/{{ app('request')->query('fileId') }}.jpg" style="width:320; height:240;"/></div>
    
    <audio controls="true" id="audiotag" style="width:500px">
        <source src="storage/audio.wav" type="audio/mpeg">
    </audio>

    <script language="JavaScript">
        Webcam.set({
            dest_width: 240,
            dest_height: 180
        });
        Webcam.attach( '#camera' );
        
        function snapshot() {
            Webcam.snap( function(data_uri) {
                document.getElementById('snapshot').innerHTML = '<img src="'+data_uri+'" style="width:320; height:240;"/>';
                var jpeg_data = data_uri.replace(/^data\:image\/jpeg\;base64\,/, '');
                document.getElementById('data').value = jpeg_data;
            } );
        }

    </script>
    
</div>