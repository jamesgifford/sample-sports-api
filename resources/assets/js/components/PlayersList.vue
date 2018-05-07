<template>
    <div class="players-list container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Players List</div>

                    <div class="card-body">
                        <ul>
                            <li v-for="player in players">
                                <p>{{ player.last_name }}, {{ player.first_name }}</p>
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
                'players': []
            }
        },

        props: {
            team: {}
        },

        mounted() {
            console.log('PlayersList component mounted.');

            if (this.team) {
                this.players = this.team.players;
            }
            else {
                axios.get('/api/players', {team: this.team}).then(response => {
                    this.players = response.data.players;
                });
            }

            this.$root.$on('player-created', (player) => {
                this.players.unshift(player);
            });
        }
    }
</script>
