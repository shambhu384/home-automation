import {DIVISION_LIST_REQUEST, DIVISION_LIST_RECEIVED,DIVISION_LIST_ERROR} from "../actions/constants";

export default (state = {
  post: null,
  isFetching: false
}, action) => {
  switch (action.type) {
    case DIVISION_LIST_REQUEST:
      return {
        ...state,
        isFetching: true
      };
    case DIVISION_LIST_RECEIVED:
      return {
        ...state,
        post: action.data,
        isFetching: false
      };
    case DIVISION_LIST_ERROR:
      return {
        ...state,
        isFetching: false
      };
    default:
      return state;
  }
}
