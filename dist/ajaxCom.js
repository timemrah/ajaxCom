function ajaxCom(url, method, data, progressCallback){


    method = method || 'POST';


    console.log('ajaxCom -> Send | '+url);


    //Promise
    return new Promise((resolve, reject) => {


        let xHttp = new XMLHttpRequest();


        //loading
        xHttp.onprogress = (oEvent) => {

            if (oEvent.lengthComputable) {
                let percentComplete = oEvent.loaded / oEvent.total * 100;
                if(progressCallback !== undefined){
                    progressCallback(percentComplete);
                }
            } else {
                //Unable to compute progress information since the total size is unknown
            }

        };




        //Ajax receive
        xHttp.onload = e => {

            let responseJson = {};

            try{
                responseJson = JSON.parse(e.target.responseText);
            } catch(e){
                //If the data that comes with ajax is not json
                console.log('ajaxCom <- Receive | '+url+' | Error: The data received from the server is not a json object!');
                alert('Unknown server error!');
                reject(e);
                return false;
            }

            //If there is an error in the data that comes with Ajax
            if(responseJson === undefined || responseJson.status === undefined){
                console.log('ajaxCom <- Receive | '+url+' | Error: Data from server is illegal!');
                alert('Unknown server error!');
                reject('Data from server is illegal!');
                return false;
            }

            //Direct
            if(responseJson.direct !== undefined && responseJson.direct !== null){
                window.location = responseJson.direct;
                return false;
            }

            //innerHTML
            if(responseJson.html !== undefined){
                for(let i in responseJson.html){
                    let elmSelector = i;
                    let text = responseJson.html[i];
                    document.querySelector(elmSelector).innerHTML = text;
                }
            }

            //Add Class to DOM
            if(responseJson.addClass !== undefined){
                for(let i in responseJson.addClass){
                    let elmSelector = i;
                    let className = responseJson.addClass[i];
                    document.querySelector(elmSelector).classList.add(className);
                }
            }

            //Remove Class from DOM
            if(responseJson.removeClass !== undefined){
                for(let i in responseJson.removeClass){
                    let elmSelector = i;
                    let className = responseJson.removeClass[i];
                    document.querySelector(elmSelector).classList.remove(className);
                }
            }

            //if alert is requested
            if(responseJson.alert === true){
                alert(responseJson.msg);
            }

            console.log('ajaxCom <- Receive | '+url+' | Msg: '+responseJson.msg);
            resolve(responseJson, e);

        };
        //Ajax receive//




        xHttp.onerror = e => {
            console.log('ajaxCom -> Send | '+url+' | Error: '+responseJson.msg);
            reject(e);
        };
        xHttp.onabort = e => {

        };
        xHttp.open(method, url);
        xHttp.send(data);


    });
    //Promise//


}