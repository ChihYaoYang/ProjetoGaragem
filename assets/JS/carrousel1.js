$(function() {
    $('.shutter').shutter({
        shutterW: "Auto", // 寬度
        shutterH: 358, // 高度
        isAutoPlay: true, // 是否自動播放
        playInterval: 3000, // 自動播放時間
        curDisplay: 4, // 當前顯示
        fullPage: false // 是否全屏
    });
});