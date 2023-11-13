const faker = require('@faker-js/faker');
const sqlDriver = require("mysql");

const connection = sqlDriver.createConnection({
    host: "localhost",
    user: "valentin",
    password: "valentin",
    database: "ui_problem",
    charset: "utf8mb4",
    port: 9906,
    insecureAuth: true,
});

const generateRandomUser = () => {
    return {
        name: faker.name.firstName(),
        surname: faker.name.lastName(),
        birthDate: faker.date.past(),
        status: Math.random() > 0.5 ? "high" : "low",
        gender: Math.random() > 0.5 ? "F" : "M",
    }
}

(async() => {
    await new Promise((res, rej) => connection.connect((err, args) => {
        if (err) rej(err);
        res();
    }));

    for(let i = 0; i < 100; i++) {
        const user = generateRandomUser();
        await new Promise((res, rej) => connection.query("INSERT INTO `user`(`name`, `surname`, `birth_date`, `status`, `gender`) VALUES (?)", [
            Object.values(generateRandomUser())
        ], (err, args) => {
            if (err) rej(err);
            res();
        }));
    }
    connection.end();
})()
