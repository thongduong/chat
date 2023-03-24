laravel broadcast
*** dung pusher
- dang ki app, tao key api, tao chanel
- ve laravel install composer require pusher/pusher-php-server
- tao 1 event extend tu broadcast
- nho dat ten lai broadcastAs de khi lang nghe o client can biet lang nghe chanel nao, va event nao
- https://stackoverflow.com/questions/69006821/pusher-no-callbacks-on-channel-for-an-event-in-laravel-and-vue 
*** dung laravel echo (ket hop redis, websocket, ...)
  https://maitrungduc.wordpress.com/2018/05/11/viet-ung-dung-chat-realtime-voi-laravel-vuejs-redis-va-socket-io-laravel-echo/

- luu y trong laradock, password cua redis duoc config trong laradock/.env (REDIS_PASSWORD=secret_redis)
- su dung laravel echo server: cau hinh redis, url test ok http://chat-server.test:6001/socket.io/ => tra ve 0
- listen ben client can fai import socket.io & laravel-echo (cua client) (*** dac biet fai set name cua channel, va event name [su dung broadcastAs o Event phia server] cho dung, them dau . vao truoc event name) mot so cho noi rang nen su dung socket.io version 2.4.0 thi do loi (chua thu) https://stackoverflow.com/questions/43066633/laravel-echo-does-not-listen-to-channel-and-events?rq=1 
