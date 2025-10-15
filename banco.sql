-- Tabela para armazenar informações dos usuários
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMPTZ DEFAULT NOW()
);

-- Tabela para armazenar as campanhas de RPG
CREATE TABLE campaigns (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    master_id INTEGER NOT NULL REFERENCES users(id) ON DELETE CASCADE, -- Se o usuário mestre for deletado, suas campanhas também são.
    invite_code VARCHAR(10) UNIQUE,
    created_at TIMESTAMPTZ DEFAULT NOW()
);

-- Tabela para armazenar as fichas dos personagens
CREATE TABLE characters (
    id SERIAL PRIMARY KEY,
    user_id INTEGER NOT NULL REFERENCES users(id) ON DELETE CASCADE, -- Se o usuário dono for deletado, seus personagens também são.
    campaign_id INTEGER NOT NULL REFERENCES campaigns(id) ON DELETE CASCADE, -- Se a campanha for deletada, seus personagens também são.
    name VARCHAR(255) NOT NULL,
    race VARCHAR(50),
    class VARCHAR(50),
    backstory TEXT,
    strength INTEGER DEFAULT 10,
    dexterity INTEGER DEFAULT 10,
    constitution INTEGER DEFAULT 10,
    intelligence INTEGER DEFAULT 10,
    wisdom INTEGER DEFAULT 10,
    charisma INTEGER DEFAULT 10,
    created_at TIMESTAMPTZ DEFAULT NOW()
);

-- Tabela de junção para registrar quais usuários participam de quais campanhas
CREATE TABLE campaign_participants (
    id SERIAL PRIMARY KEY,
    user_id INTEGER NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    campaign_id INTEGER NOT NULL REFERENCES campaigns(id) ON DELETE CASCADE,
    joined_at TIMESTAMPTZ DEFAULT NOW(),
    -- Garante que um usuário não pode se juntar à mesma campanha mais de uma vez
    UNIQUE(user_id, campaign_id)
);