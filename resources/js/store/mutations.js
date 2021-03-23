let mutations = {
    GET_COMMENTS(state, comments) {
        state.comments = comments;
    },
    ADD_COMMENT(state, comment) {
        state.comments = [...state.comments, comment];
    },
    GET_BUILDINGS(state, building) {
        state.buildings = building;
    },
    ADD_BUILDINGS(state, building) {
        state.buildings = [...state.buildings, building];
    }
};

export default mutations;