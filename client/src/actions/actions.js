import {requests} from "../agent";
import {
  DIVISION_LIST_REQUEST, DIVISION_LIST_RECEIVED,DIVISION_LIST_ERROR

} from "./constants";
import {SubmissionError} from "redux-form";
import {parseApiErrors} from "../apiUtils";

export const blogPostListRequest = () => ({
  type: BLOG_POST_LIST_REQUEST,
});

export const blogPostListError = (error) => ({
  type: BLOG_POST_LIST_ERROR,
  error
});

export const blogPostListReceived = (data) => ({
  type: BLOG_POST_LIST_RECEIVED,
  data
});

export const blogPostListSetPage = (page) => ({
  type: BLOG_POST_LIST_SET_PAGE,
  page
});

export const blogPostListFetch = (page = 1) => {
  return (dispatch) => {
    dispatch(blogPostListRequest());
    return requests.get(`/blog_posts?_page=${page}`)
      .then(response => dispatch(blogPostListReceived(response)))
      .catch(error => dispatch(blogPostListError(error)));
  }
};

export const getDivisionRequest = () => ({
  type: DIVISION_LIST_REQUEST,
});

export const blogPostError = (error) => ({
  type: BLOG_POST_ERROR,
  error
});

export const blogPostReceived = (data) => ({
  type: BLOG_POST_RECEIVED,
  data
});

export const blogPostUnload = () => ({
  type: BLOG_POST_UNLOAD,
});

export const userProfileFetch = (userId) => {
  return (dispatch) => {
    dispatch(getDivisionRequest());
    return requests.get(`/users/${userId}`, true).then(
      response => dispatch(userProfileReceived(userId, response))
    ).catch(() => dispatch(userProfileError(userId)))
  }
};
