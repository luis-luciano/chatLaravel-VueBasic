// echo.js
import Event from './event';

Echo.join('chat')
  .here(users => { // Aqui o usuarios en linea
    Event.$emit('users.here', users);
  })
  .joining(user => { // Unido o conectado
    Event.$emit('users.joined', user);
  })
  .leaving(user => { // Dejando o desconectando
    Event.$emit('users.left', user);
  })
  .listen('MessageCreated', (data) => {
    Event.$emit('added_message', data.message);
  });
