<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Canvas</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>

    <body>
        <div id="container">
            <fieldset>
                <label for="" style="padding-right: 20px">Edad</label>
                <input type="number" v-model="age" />
                <h1 v-if="age>=18">Pasele a pistear</h1>
                <h1 v-show="age < 18">Fuga pa la casa</h1>
            </fieldset>

            <hr/>
            <h1>{{ name }}</h1>
            <p>{{ lastname }}</p>

            <fieldset>
                <h1>Datos Personales</h1>
                <input type="text" v-model="name" name="" />
                <input type="text" v-model="lastname" lastname="" />
                <button @click="saludar">Saludar</button>
            </fieldset>
            <hr />
            <fieldset>
                <legend>calculadora</legend>
                <input type="number" v-model="num1" name="" />
                <input type="number" v-model="num2" lastname="" />
                <button @click="suma">suma</button>
                <h3>{{ resultado }}</h3>
            </fieldset>
            <hr />
            <h2>Plebada</h2>
            <ul>
                <li v-for="alumno in alumnos">{{alumno.name}}, Rol:  {{alumno.role}}</li>
            </ul>

            <hr>
            <fieldset>
                <legend>Nuevo alumno</legend>
                <input type="text" v-model="a_name" name="" />
                <input type="text" v-model="a_role" lastname="" />
                <button @click="agregar">Agregar</button>
            </fieldset>
            <hr />
        </div>

        <script src="https://unpkg.com/vue@3"></script>
        <script type="text/javascript">
            const { createApp } = Vue;

            const app = createApp({
                data() {
                    return {
 
                        num1: 0,
                        num2: 0,
                        resultado: 0,
                        age: 0,
                        alumnos: [

                            {
                                name: 'manu',
                                role: 'Fullstack'
                            },
                            {
                                name: 'Kugue',
                                role: 'back end'
                            },
                            {
                                name: 'dara',
                                role: 'Hackersilla'
                            },
                        ],
                        a_name: '',
                        roles: ''
                    };
                },
                methods: {
                    saludar() {
                        alert('Hola, ' + this.name + ' ' + this.lastname);
                    },
                    suma() {
                        this.resultado =+ this.num1 + this.num2;
                    },
                    agregar(){
                        this.alumnos.push({name:this.a_name,role:this.roles});
                        this.a_name = '';
                        this.roles = '';
                    }
                },
            }).mount('#container');
        </script>
    </body>
</html>
