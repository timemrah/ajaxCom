function ajaxCom(url, method, data, progressCallbackDOM){

    method = method || 'POST'; //Set default method

    console.log('ajaxCom -> Send | '+url);

    let xHttp  = new XMLHttpRequest();


    //Promise
    return new Promise((resolve, reject) => {


        //Loading Progresses
        xHttp.onprogress = e => {
            if (e.lengthComputable) {

                let percentComplete = e.loaded / e.total * 100;

                if(typeof progressCallbackDOM === "function"){
                    //If progressCallbackDOM is callback function
                    progressCallbackDOM(percentComplete);
                } else if(progressCallbackDOM !== undefined && progressCallbackDOM.nodeType === 1){
                    //If progressCallbackDOM is DOM Element
                    progressCallbackDOM.style.width = percentComplete+'%';
                }
            }
        };
        xHttp.upload.onprogress = e => {
            if (e.lengthComputable) {

                let percentComplete = e.loaded / e.total * 100;

                if(typeof progressCallbackDOM === "function"){
                    //If progressCallbackDOM is callback function
                    progressCallbackDOM(percentComplete);
                } else if(progressCallbackDOM !== undefined && progressCallbackDOM.nodeType === 1){
                    //If progressCallbackDOM is DOM Element
                    progressCallbackDOM.style.width = percentComplete+'%';
                }
            }
        };
        //Loading Progresses//


        //Ajax receive
        xHttp.onload = e => {

            try{
                responseJson = JSON.parse(e.target.responseText);
            } catch(e){
                //If the data that comes with ajax is not json
                console.log('ajaxCom <- Receive | '+url+' | Error: The data received from the server is not a json object!');
                reject(e);
                return false;
            }

            //If there is an error in the data that comes with Ajax
            if(responseJson === undefined || responseJson.status === undefined){
                console.log('ajaxCom <- Receive | '+url+' | Error: Data from server is illegal!');
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

            //Add and Remove Class From DOM
            if(responseJson.class !== undefined){
                for(let i in responseJson.class){
                    let selector = i;
                    let selectorClassList = responseJson.class[i];

                    for(let i in selectorClassList){
                        let className = i;
                        let process = selectorClassList[i];

                        if(process === 'add'){
                            document.querySelector(selector).classList.add(className);
                        } else{
                            document.querySelector(selector).classList.remove(className);
                        }
                    }
                }
            }

            //Set Attribute to DOM
            if(responseJson.setAttr !== undefined){
                for(let i in responseJson.setAttr){
                    let selector = i;
                    let selectorAttrList = responseJson.setAttr[i];

                    for(let i in selectorAttrList){
                        let attrName = i;
                        let attrValue = selectorAttrList[i];
                        document.querySelector(selector).setAttribute(attrName, attrValue);
                    }
                }
            }

            //Remove Attribute to DOM
            if(responseJson.removeAttr !== undefined){
                for(let i in responseJson.removeAttr){

                    let selector = i;
                    let selectorAttrList = responseJson.removeAttr[i];

                    for(let i in selectorAttrList){

                        let attrName = i;
                        document.querySelector(selector).removeAttribute(attrName);

                    }
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
            console.log('ajaxCom -> Error: | '+url);
            reject(e);
        };
        //xHttp.onabort = e => { };
        xHttp.open(method, url);
        xHttp.send(data);

    });
    //Promise//

}