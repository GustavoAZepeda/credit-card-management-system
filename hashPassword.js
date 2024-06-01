const bcrypt = require('bcryptjs');

const password = 'password123';
const salt = bcrypt.genSaltSync(10);
const hashedPassword = bcrypt.hashSync(password, salt);

console.log('Hashed Password:', hashedPassword);
