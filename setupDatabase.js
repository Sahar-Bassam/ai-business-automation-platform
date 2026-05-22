import Database from 'better-sqlite3';

const db = new Database('database.db'); 

// Creating table

db.exec(`
CREATE TABLE IF NOT EXISTS ai_plans (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    company_size TEXT,
    industry TEXT,
    title TEXT,
    description TEXT,
    price_range TEXT
);
`);

console.log('Database and table created!');
db.close();
