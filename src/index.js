import _ from 'lodash';
import Swiper from 'swiper';
import "./styles/style.scss";
import $ from "jquery";


class generalCall {
    callAxeptio() {
        window.axeptioSettings = {
            clientId: "***",
            cookiesVersion: "stacky-base",
            };
            
            (function(d, s) {
            var t = d.getElementsByTagName(s)[0], e = d.createElement(s);
            e.async = true; e.src = "//static.axept.io/sdk.js";
            t.parentNode.insertBefore(e, t);
            })(document, "script");
        
        
        void 0 === window._axcb && (window._axcb = []);
        window._axcb.push(function(axeptio) {
            axeptio.on("cookies:complete", function(choices) {
            //PUSH ANALYSTIC
            })
        })
    }
}
  
const general = new generalCall;
general.callAxeptio();

// CALL SPECIFIC SCRIPT
switch (location.pathname.split('/')[2]) {
    case "":
        break;
}