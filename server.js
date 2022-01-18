//Запускаем сервер
let http = require('http').Server();

//подключаем библиотеку socket.io и привязываем ее к серверу
//socket.io - реализует протокол websocket для связи сервера с клиентом в браузере
let io = require('socket.io')(http);

//чтобы иметь доступ к Redis серверу мы используем библиотеку ioredis
let Redis = require('ioredis');

let redis = new Redis();

//для того чтобы получить значения  с сервера Redis необходимо подписаться на канал,
// который указан в событии Laravel
redis.subscribe('new-action');

//и запустить прослушивание/слежение
//в результате будут возвращены имя канала и сообщение
redis.on('message', function (channel, message) {
    //как только придет событие оно обрабатывается
    console.log('Message received: '+message);
    console.log('Channel: '+channel);
    message = JSON.parse(message);
    //необходимо отправить данные всем клиентам
    //необходимо передать название канала и пространство имен событий
    io.emit(channel+':'+message.event, message.data)
});

http.listen(3000, function () {
    console.log('Listening on Port: 3000');
})
