<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financelobby Scrap</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Roboto', sans-serif;
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        body{
            display:flex;
            justify-content: center;
            align-items: center;
            background-color:rgba(235,235,235,0.9);
            height: 100vh;
        }
        .popup_cn{
            width: 360px;
            max-width: 100%;
            height: 500px;
            max-height: 100%;
            background: white;
            box-shadow:  1px 1px 14px rgba(0,0,0,0.3);
            position: relative;
        }
        .h1{
            display: block;
            width: 100%;
            margin: auto;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
           
            font-weight: 500;
            font-size: 1.2em;
            margin-bottom: 12px;
            background-color: #ec2a00;
            color: white;
        }
        .cn{
            padding: 0px 10px;
        }
        .cn #session_id,
        .cn .rng{
            width: calc(100% - 70px);
            height: 34px;
            padding: 0px 10px;
            background: rgba(0,0,0,0.07);
            border: navajowhite;
        }
        .cn button{
            width: 60px;
            float: right;
            height: 34px;
            padding: 0px 10px;
            background: #EC2A00;
            border: none;
            color: white;
            cursor: pointer;
            font-weight: 500;
        }
        .bottom_border{
            border-width:   12px;
            border-style:   solid;
            border-color:   transparent #EC2A00 #EC2A00 #EC2A00;
            position:       absolute;
            bottom:         0px;
            width:          100%;
            border-top:     14px solid transparent;
        }
        .range{
            margin-bottom: 8px;
        }
        .range input.rng {
            width: calc(50% - 5px);
        }
        #range_end{
            float: right;
        }
        .process *{
            letter-spacing: 0.6px;
            font-family: 'Bebas Neue', cursive;
            color: rgba(0,0,0,0.6);
        }
        .process{
            margin-top: 12px;
            display: grid;
            grid-template-columns: 50% 50%;
            cursor: pointer;
        }
        .process > div{
            margin-bottom: 6px;
        }
        .clear{
            cursor: pointer;
        }
        .log_cn{
            background: rgba(0,0,0,0.9);
            height: 290px;
            margin-top: 8px;
            padding: 12px 10px;
            color: white;
            font-size: 0.8em;
            overflow: auto;
        }
        .log_cn span{
            display: block;
            margin-bottom: 6px;
            position: relative;
            /* cursor:not-allowed; */
        }
        .log_cn span::before{
            content: ' ';
            width: 3px;
            background-color: #EC2A00;
            height: 100%;
            position: absolute;
            margin-left: -10px;
        }
        ::-webkit-scrollbar {
            width: 0;
        }

        
    </style>
</head>
<body>
    
    <div class="popup_cn">
        <span class="h1">Get Financelobby Users list</span>
        <div class="cn">
            <form onsubmit="event.preventDefault();" id='f_frm'>
            <div class="range">
                <input type="number" name='range_start' id='range_start' class="rng" placeholder="Enter Start Page" value='1'>
                <input type="number" name='range_end' id='range_end' class="rng" placeholder="Enter End Page" value='9'>
            </div>
            <input type="text" name='session_id' id='session_id' placeholder="Enter Cookie Session" autocomplete="off" value='eyJpdiI6IkwzeWkvRUxxa0RkMGpYRm5PcU1BOFE9PSIsInZhbHVlIjoieXJrQWQ5VHZlaUxlQi9KeWpmclJZNUJFeW9Fb28zN2puczhHUExNOXFuTEMvcEhST2I3Kzd2UHRZbTdRY3dDbzBnc0U4eWVRMWR4dGZmbnZTbTJQeXYzci85dE5BRDkvQXJBYk5mK2FIVGtxNXE3S2NYNTg0SDFaTVVFSTVmdCsiLCJtYWMiOiI5MWJiZDdiNTI1MTQ0ZDExOWYyMzgyZmU4NjFmZGIzYWI1NzBkMzY0NDE1ZjNhZmQ4NDI2NGJjNDExOTJmZmJmIn0%3D'>
            <button id="export">Export</button>
            <div class="process">
                <div class="clear">Clear</div>
                <div class="download">Download</div>
            </div>
            </form>
        </div>
        <div class="log_cn">
            <div id="log">
            </div>
        </div>
        <div class="bottom_border">
        </div>
    </div>
    <script>
        document.querySelector('.clear').onclick=()=>{
            clear();
        }
        document.querySelector('.download').onclick=()=>{
            if(localStorage.getItem('down_data')){
                var element = document.createElement('a'); 
                element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(localStorage.getItem('down_data')));  
                element.setAttribute('download', document.querySelector('html title').innerText+'.csv');
                element.click();
                element.remove();
            }
            else{
                alert('Empty data to download');
            }
        }
        function push_log(data='Something Wrong.'){
            var s=document.createElement('span');
            s.innerHTML = data;
            document.querySelector('#log').appendChild(s);
            element=document.querySelector('.log_cn')
            element.scrollTo(0, element.scrollHeight);
        }
        function clear(){
            document.querySelectorAll('#f_frm input').forEach((item)=>{
                item.value='';
            })
        }
        document.querySelector("#export").onclick =  ()=> {
            
            localStorage.setItem("down_data", ""); 
            localStorage.setItem("p_data", 0);  
            if(document.querySelector('#range_start').value < document.querySelector('#range_end').value){
                push_log('Connecting....');
            
                var formData = new FormData(); 
                document.querySelectorAll('#f_frm input').forEach(item=>{
                    formData.append(item.name,item.value);
                })
                formData.append('action','connect_it');
                var xmlHttp = new XMLHttpRequest();
                xmlHttp.onreadystatechange = function()
                {
                    if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
                    {
                        var r_text =xmlHttp.responseText;
                        try {
                            var j_data = JSON.parse(r_text);
                        }
                        catch(err) {
                            var j_data = false;
                            console.log(err);
                        }
                        if(j_data){
                            if(j_data.status){
                                run_n=false;
                                var xmlString = j_data.data;
                                var doc = new DOMParser().parseFromString(xmlString, "text/html");
                                if(doc.querySelector('#userTable')){
                                    push_log(j_data.message);
                                    run_n=true;
                                } 
                                else{
                                    push_log('Invaid Session.');
                                }
                               
                                if(run_n){
                                    var i=document.querySelector('#range_start').value;
                                    var t=window.setInterval(()=>{
                                        if(i >= (document.querySelector('#range_end').value - 0)){
                                            clearInterval(t);
                                            
                                        }
                                        fetch_page(i);
                                        i++;
                                    },1000);
                                }
                            }
                            else{
                                push_log('status error');
                            }
                        }
                        else{
                            push_log('data error');
                        }
                    }
                    
                }
                xmlHttp.open("post", "ajax.php"); 
                xmlHttp.send(formData); 
            }
            else{
                alert('Invaid Range')
            }
        }




        function fetch_page(data){
            var formData = new FormData(); 
            formData.append('action','fetch_page');
            formData.append('page',data);
            formData.append('session_id',document.querySelector('#session_id').value);
            var xmlHttp = new XMLHttpRequest();
                xmlHttp.onreadystatechange = function()
                {
                    if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
                    {
                        var r_text =xmlHttp.responseText;
                        try {
                            var j_data = JSON.parse(r_text);
                        }
                        catch(err) {
                            var j_data = false;
                            console.log(err);
                        }
                        if(j_data){
                            var doc = new DOMParser().parseFromString(j_data.data, "text/html");
                            var tr_s=doc.querySelectorAll('#userTable tbody tr');
                            var c=localStorage.getItem("p_data")-0;  
                            var t_txt='';
                            tr_s.forEach((tr)=>{
                                temp='';
                                tr.querySelectorAll('td').forEach((td)=>{
                                    if(td.innerText){
                                        temp+=td.innerText.trim().replace('Delete user','')+',';
                                    }
                                    else{
                                        temp+=',';
                                    }
                                });
                                temp+='\n';
                                t_txt+=temp;
                                c+=1;
                            });
                            localStorage.setItem('p_data',c-0);
                            var prev_d=localStorage.getItem('down_data');
                            localStorage.setItem('down_data',prev_d+t_txt);
                            push_log('Page:'+data+' Count:'+localStorage.getItem('p_data'))
                            if(data==document.querySelector('#range_end').value){
                                push_log('Done . Click on download if file not downloaded.');
                                document.querySelector('.download').click();
                            }
                        }

                    }
                    
                }
                xmlHttp.open("post", "ajax.php"); 
                xmlHttp.send(formData); 
        }
        </script>
</body>
</html>
