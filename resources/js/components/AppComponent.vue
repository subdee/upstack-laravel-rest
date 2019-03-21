<template>
    <div class="container">
        <div class="row justify-content-center">
            <form>
                <div class="form-group row">
                    <label for="teamName" class="col-3 col-form-label">Team name</label>
                    <div class="col-7">
                        <input type="text" class="form-control" v-model="teamName" id="teamName">
                    </div>
                    <button class="col-2 btn btn-primary" type="button" @click="create">Create</button>
                </div>
            </form>
        </div>
        <div class="row justify-content-center">
            <team-component
                v-for="team in teams"
                v-bind="team"
                :key="team.id"
                @update="update"
                @delete="del">
            </team-component>
        </div>
    </div>
</template>

<script>
    import TeamComponent from './TeamComponent';

    function Team({id, name, players}) {
        this.id = id;
        this.name = name;
        this.players = players;
    }

    export default {
        components: {TeamComponent},
        data() {
            return {
                teams: [],
                teamName: ''
            }
        },
        methods: {
            create() {
                const data = new FormData();
                data.append('name', this.teamName);
                window.axios.post('/api/teams', data).then(({data}) => {
                    this.teams.push(new Team(data));
                    this.teamName = '';
                });
            },
            read() {
                window.axios.get('/api/teams').then(({data}) => {
                    data.forEach(team => {
                        this.teams.push(new Team(team));
                    });
                });
            },
            update(id, color) {

            },
            del(id) {
                window.axios.delete('/api/teams/' + id).then(({}) => {
                    let index = this.teams.findIndex(team => team.id === id);
                    this.teams.splice(index, 1);
                })
            }
        },
        created: function () {
            this.read();
        }
    }
</script>
