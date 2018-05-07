<template>
    <div class="player-create container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Add Player</div>

                    <div class="card-body">
                        <form method="post" @submit.prevent="createPlayer">
                            <input type="text" name="" value="" placeholder="First Name" v-model="player.first_name">
                            <input type="text" name="" value="" placeholder="Last Name" v-model="player.last_name">
                            <button type="submit" name="button">Submit</button>
                        </form>
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
                player: {}
            }
        },

        props: {
            team: {}
        },

        mounted() {
            console.log('PlayerCreate component mounted.');
        },

        methods: {
            createPlayer: function () {
                axios.post('/api/players', {player: this.player, team: this.team}).then(response => {
                    this.$root.$emit('player-created', response.data.player);
                });
            }
        }
    }
</script>
