<template>
    <div class="teams-list container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Teams List</div>

                    <div class="card-body">
                        <ul>
                            <li v-for="team in teams">
                                <p><a :href="'/teams/' + team.slug">{{ team.name }}</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                'teams': []
            }
        },

        mounted() {
            console.log('TeamsList component mounted.');

            axios.get('/api/teams').then(response => {
                this.teams = response.data.teams;
            });

            this.$root.$on('team-created', (team) => {
                this.teams.unshift(team);
            });
        }
    }
</script>
