import express, { request, response } from 'express';
import { PrismaClient } from '@prisma/client';

const prisma = new PrismaClient();

const app = express();
app.use(express.json());

//Create
app.post('/aluno', async (request, response) => {
    const aluno = await prisma.aluno.create({
        data: {
            nome: request.body.nome,
            presenca: request.body.presenca
        }
    })
    response.status(201).json(aluno);
})

//Read
app.get('/aluno', async (request, response) => {
    const alunos = await prisma.aluno.findMany();
    response.status(200).json(alunos);
});

//Update
app.put('/aluno/:alunoID', async (request, response) => {
    const id = await parseInt(request.params.alunoID);
    const updateAluno = await prisma.aluno.update(

        {
            where: {
                alunoID: id,
            },
            data: {
                nome: request.body.nome,
                presenca: request.body.presenca
            }
        });
    response.status(201).json(updateAluno);
});

//Delete
app.delete('/aluno/:alunoID', async (request, response) => {
    const id = await parseInt(request.params.alunoID);
    const deleteAluno = await prisma.aluno.delete({
        where: {
            alunoID: id,
        },
    });
    response.status(202).json(deleteAluno);
});

app.patch('/aluno/:alunoID', async (request, response) => {
    const id = await parseInt(request.params.alunoID)
    const alterarStatus = await prisma.aluno.update({
        where: {
            alunoID: id,
        },
        data: {
            presenca: request.body.presenca
        }
    });
    response.status(201).json(alterarStatus)
});

//Escola

//Create
app.post('/escola', async (request, response) => {
    const escola = await prisma.escola.create({
        data: {
            Nome: request.body.Nome,
            Email: request.body.Email,
            Endereco: request.body.Endereco,
            Telefone: request.body.Telefone,
            Senha: request.body.Senha,
            isPublica: request.body.isPublica
        }
    })
    response.status(201).json(escola);
})

//Read
app.get('/escola', async (request, response) => {
    const escola = await prisma.escola.findMany();
    response.status(200).json(escola);
});

//Update
app.put('/escola/:idEscola', async (request, response) => {
    const id = await parseInt(request.params.idEscola);
    const updateEscola = await prisma.escola.update(
        {
            where: {
                idEscola: id,
            },
            data: {
                Nome: request.body.Nome,
                Email: request.body.Email,
                Endereco: request.body.Endereco,
                Telefone: request.body.Telefone,
                Senha: request.body.Senha,
                isPublica: request.body.isPublica
            }
        });
    response.status(201).json(updateEscola);
});

//Delete
app.delete('/escola/:idEscola', async (request, response) => {
    const id = await parseInt(request.params.idEscola);
    const deleteEscola = await prisma.escola.delete({
        where: {
            idEscola: id,
        },
    });
    response.status(202).json(deleteEscola);
});

app.listen(3000);
