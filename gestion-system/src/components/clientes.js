// src/components/Clientes.js
import React, { useEffect, useState } from 'react';
import axios from 'axios';

function Clientes() {
    const [clientes, setClientes] = useState([]);

    useEffect(() => {
        // Hacer una solicitud GET a la API de Laravel
        //axios.get('http://localhost:8000/api/clientes')
        axios.get('http://gestionsystem_lvl9.test/api/clientes')
            .then(response => {
                console.log(response.data);
                
                setClientes(response.data);
            })
            .catch(error => {
                console.error("Hubo un error al obtener los clientes!", error);
            });
    }, []);

    return (
        <div>
            <h1>Lista de Clientes</h1>
            <ul>
                {clientes.map(cliente => (
                    <li key={cliente.id}>{cliente.name} {cliente.phone} {cliente.email}</li>
                ))}
            </ul>
        </div>
    );
}

export default Clientes;