export declare interface Call {
  /**
   * Adds a listener to the call.
   *
   * @param listener - the {@link CallListener}
   */
  addListener(listener: CallListener): void;
  /**
   * Removes a listener from the call.
   *
   * @param listener - the {@link CallListener}
   */
  removeListener(listener: CallListener): void;
  /**
   * Ends the call, regardless of what state it is in. If the call is an
   * incoming call that has not yet been answered, the call will be reported
   * as denied to the caller.
   */
  hangup(): void;
  /**
   * Answers an incoming call.
   *
   * @throws InvalidOperationError If the call is not incoming
   */
  answer(): void;
  /**
   * Mute audio.
   */
  mute(): void;
  /**
   * Unmute audio.
   */
  unmute(): void;
  /**
   * Pause the video capturing.
   */
  pauseVideo(): void;
  /**
   * Resume the video capturing.
   */
  resumeVideo(): void;
  /**
   * Sends one or more DTMF tones for tone dialing. (Only applicable for calls terminated
   * to PSTN (Publicly Switched Telephone Network)).
   *
   * @param keys - May be a series of DTMF keys. Each key must be in [0-9, #, *, A-D].
   * @throws IllegalArgumentException if any of the given DTMF keys is invalid
   */
  sendDtmf(keys: string): void;
  /**
   * Returns metadata about the call.
   *
   * @returns a {@link CallDetails} containing metadata about the call.
   */
  details: CallDetails;
  /**
   * Returns the headers.
   *
   * IMPORTANT: Headers may not be immediately available due to
   * push payload size limitations.
   * If it's not immediately available, it will be available after the `onCallProgressing`
   * or `onCallEstablished` callbacks for {@link CallListener} are called.
   *
   * @returns the headers.
   */
  headers: Record<string, string> | undefined;
  /**
   * Returns the identifier of the remote participant in the call.
   *
   * @returns the identifier of the remote participant in the call.
   */
  remoteUserId: string;
  /**
   * Returns the {@link CallState} the call is currently in.
   *
   * @returns the state the call is currently in.
   */
  state: CallState;
  /**
   * Returns the call identifier.
   *
   * @returns the call identifier.
   */
  id: string;
  /**
   * Returns the {@link Direction} of the call.
   *
   * @returns the direction of the call.
   */
  direction: Direction;
  /**
   * Returns the local MediaStream of the call.
   *
   * @returns the local MediaStream of the call.
   */
  incomingStream: MediaStream | undefined;
  /**
   * Returns the remote MediaStream of the call.
   *
   * @returns the remote MediaStream of the call.
   */
  outgoingStream: MediaStream | undefined;
  /**
   * Returns the callers displayName.
   *
   * @returns the callers displayName.
   */
  remoteUserDisplayName?: string;
}

export declare interface CallClient {
  /**
   * Makes a call to the user with the given id.
   *
   * @param toUserId - The app specific id of the user to call. May not be null or empty.
   * @param headers - Headers to pass with the call.
   * @returns A {@link Call} instance.
   * @throws InvalidOperationError    if {@link SinchClient} is not started
   * @throws ArgumentError            if the size of all header strings exceeds 1024 bytes when encoded as UTF-8.
   */
  callUser(toUserId: string, headers?: Record<string, string>): Promise<Call>;
  /**
   * Makes a video call to the user with the given id and adding the given headers.
   *
   * @param toUserId - The app specific id of the user to call. May not be null or empty.
   * @param headers  - Headers to pass with the call.
   * @returns A {@link Call} instance.
   * @throws InvalidOperationError    if {@link SinchClient} is not started
   * @throws ArgumentError            if the size of all header strings exceeds 1024 bytes when encoded as UTF-8.
   */
  callUserVideo(
    toUserId: string,
    headers?: Record<string, string>
  ): Promise<Call>;
  /**
   * Calls a phone number and terminates the call to the PSTN-network (Publicly Switched
   * Telephone Network).
   *
   * @param phoneNumber - The phone number to call.
   *                    The phone number should be given according to E.164 number formatting
   *                    (http://en.wikipedia.org/wiki/E.164) and should be prefixed with a '+'.
   *                    E.g. to call the US phone number 415 555 0101, it should be specified as
   *                    "+14155550101", where the '+' is the required prefix and the US country
   *                    code '1' added before the local subscriber number.
   * @param headers -    Headers to pass with the call.
   * @returns A {@link Call} instance.
   * @throws InvalidOperationError    if {@link SinchClient} is not started
   * @throws ArgumentError            if conferenceId exceeds 64 characters
   * @throws ArgumentError            if the size of all header strings exceeds 1024 bytes when encoded as UTF-8.
   */
  callPhoneNumber(
    phoneNumber: string,
    headers?: Record<string, string>
  ): Promise<Call>;
  /**
   * Makes a SIP call to the user with the given identity. The identity should be in the form "sip:user\@server".
   *
   * @param sipIdentity - SIP identity to dial in to.
   * @returns A {@link Call} instance.
   * @throws InvalidOperationError    if {@link SinchClient} is not started
   * @throws ArgumentError            if sipIdentity exceeds 64 characters
   * @throws ArgumentError            if the size of all header strings exceeds 1024 bytes when encoded as UTF-8.
   */
  callSip(sipIdentity: string, headers?: Record<string, string>): Promise<Call>;
  /**
   * Calls the conference with the given id and the given headers.
   *
   * @param conferenceId - Conference ID to dial in to.
   * @param headers - Headers to pass with the call.
   * @returns A {@link Call} instance.
   * @throws InvalidOperationError    if {@link SinchClient} is not started
   * @throws ArgumentError            if the size of all header strings exceeds 1024 bytes when encoded as UTF-8.
   */
  callConference(
    conferenceId: string,
    headers?: Record<string, string>
  ): Promise<Call>;
  /**
   * The {@link CallClientListener} object will be notified of new incoming calls.
   *
   * @param listener - a {@link CallClientListener}
   */
  addListener(listener: CallClientListener): void;
  /**
   * Remove listener for incoming call events.
   *
   * @param listener - a {@link CallClientListener}
   */
  removeListener(listener: CallClientListener): void;
  /**
   * Returns the {@link Call} object with the identifier `callId`.
   *
   * @param callId - The call identifier string.
   * @returns A {@link Call} instance if one matches, otherwise `undefined`.
   */
  getCall(callId: string): Call | undefined;
}

/**
 * Tells the listener that an incoming call has been received.
 */
export declare interface CallClientListener {
  /**
   *
   * @param callClient - The callClient informing the listener that an incoming call was
   *                     received. The listener of the incoming call object should be
   *                     set by the implementation of this method.
   * @param call -       The incoming call.
   */
  onIncomingCall(callClient: CallClient, call: Call): void;
}

export declare interface CallDetails {
  duration: number;
  hadVideoStream: boolean;
  hadAudioStream: boolean;
  requestedVideo: boolean;
  requestedAudio: boolean;
  setupDuration: number;
  establishedTime?: Date;
  endedTime?: Date;
  progressTime?: Date;
  startedTime: Date;
  get error(): Error | undefined;
  get endCause(): CallEndCause;
}

export declare enum CallEndCause {
  None = 0,
  Timeout = 1,
  Denied = 2,
  NoAnswer = 3,
  Failure = 4,
  HungUp = 5,
  Canceled = 6,
  OtherDeviceAnswered = 7,
  Inactive = 8,
}

/**
 * Represents a listener of {@link Call} events. The methods handle call state changes.
 *
 * # Call State Progression
 *
 * For a complete outgoing call, the listener methods will be called in the following order:
 *
 * - onCallProgressing
 * - onCallEstablished
 * - onCallEnded
 *
 * For a complete incoming call, the delegate methods will be called in the following order, after
 * the callback method {@link CallClientListener.onIncomingCall} has been called:
 * - onCallEstablished
 * - onCallEnded
 */
export declare interface CallListener {
  /**
   * Tells the listener that the outgoing call is progressing and a progress tone can be played.
   *
   * The call has entered the PROGRESSING state.
   *
   * @param call - The outgoing call to the client on the other end.
   */
  onCallProgressing?(call: Call): void;
  /**
   * Tells the listener that the call was established .
   *
   * The call has entered the ESTABLISHED state.
   *
   * @param call - The call that was established.
   */
  onCallEstablished?(call: Call): void;
  /**
   * Tells the listener that a new remote track has been received.
   *
   * @param call - The call that received the remote track.
   * @param track - The media track.
   */
  onRemoteTrack?(call: Call, track: MediaStreamTrack): void;
  /**
   * Tells the listener that the call ended.
   *
   * The call has entered the ENDED state.
   *
   * @param call - The call that ended.
   */
  onCallEnded?(call: Call): void;
}

/**
 * The CallNotificationResult is used to indicate the result of a relayed push notification {@link SinchClient.relayRemotePushNotification}
 * The CallNotificationResult includes call related information.
 */
export declare interface CallNotificationResult {
  /**
   * Returns the call identifier.
   *
   * @returns the call identifier.
   */
  callId: string;
  /**
   * Returns the remote user identifier.
   *
   * @returns the remote user identifier.
   */
  remoteUserId: string;
  /**
   * Returns whether the caller offered video.
   * @returns true if the caller offered video, false otherwise.
   */
  isVideoOffered(): boolean;
  /**
   * Returns headers associated with the call.
   * @returns empty string if no headers were set by the call initiator.
   */
  headers: Record<string, string> | undefined;
  /**
   * Indicates whether the call has timed out.
   *
   * @returns true if the call has timed out, otherwise false.
   */
  hasTimedOut(): boolean;
  /**
   * Returns the remote domain.
   * @returns the remote domain.
   */
  domain: Domain;
}

export declare enum CallState {
  Init = 0,
  Progressing = 1,
  Established = 2,
  Ended = 3,
}

/**
 * Callback object to be used to proceed in user registration/setup when
 * registration credentials for the user in question have been obtained.
 */
export declare class ClientRegistration {
  register: (jwtSignature: string) => Promise<void>;
  registerFailed: () => void;
  /**
   * Method to call when registration credentials for the user have been
   * obtained.
   *
   * @param jwtSignature - Signed JWT token for this app's instance
   */
  constructor(
    register: (jwtSignature: string) => Promise<void>,
    registerFailed: () => void
  );
}

export declare enum Direction {
  Inbound = 0,
  Outbound = 1,
}

export declare enum Domain {
  Mxp = "mxp",
  Pstn = "pstn",
  Sip = "sip",
  Conference = "conference",
}

export declare enum ErrorType {
  Network = 0,
  Capability = 1,
  Other = 2,
}

declare type FetchAPI = WindowOrWorkerGlobalScope["fetch"];

export declare interface MediaStreamFactory {
  getMediaStream(audio: boolean, video: boolean): Promise<MediaStream>;
}

/**
 * The NotificationResult is used to indicate the result of a relayed push notification {@link SinchClient.relayRemotePushNotification}.
 */
export declare interface NotificationResult {
  /**
   * Indicates whether the push notification is valid.
   *
   * @returns true if the push notification is valid, otherwise false.
   */
  isValid(): boolean;
  /**
   * The display name of the user calling or sending the message, if available.
   * Only available when the complete <code>Intent</code> was forwarded to {@link SinchClient.relayRemotePushNotification}
   * and if the display name was set on the sender side.
   *
   * @returns String if available, otherwise undefined
   */
  displayName?: string;
  /**
   * This method returns a CallNotificationResult.
   *
   * @returns a CallNotificationResult
   */
  callNotificationResult: CallNotificationResult;
}

export declare class Sinch {
  static getSinchClientBuilder(): SinchClientBuilder;
  /**
   * Returns the current version of the Sinch SDK library.
   *
   * @returns the current version of the Sinch SDK library.
   */
  static get version(): string;
}

/**
 * SinchClient is an entry point for whole SDK
 */
export declare interface SinchClient {
  /**
   * Starts the Sinch client. This must be done prior to making any calls.
   *
   * @throws InvalidOperationError if {@link SinchClient} is already started
   */
  start(): Promise<void>;
  /**
   * @returns true if the {@link SinchClient} is started.
   */
  isStarted(): boolean;
  /**
   * Method used to forward the Sinch specific payload extracted from an
   * incoming push notification. This will implicitly start the
   * {@link SinchClient} if it wasn't already started.
   *
   * @param payload - Sinch specific payload which was transferred with the message
   * @param name - Display name of the caller
   * @returns A result indicating initial inspection of the payload.
   */
  relayRemotePushNotification(
    payload: Record<string, string>
  ): NotificationResult;
  /**
   * Specify a display name to be used when the Sinch client initiates a call a on
   * behalf of the local user (e.g. for an outgoing video call).
   *
   * Display name is included in a push notification on a best-effort basis. For example, if the
   * target device has very limited push payload size constraints (e.g iOS 7 can only handle
   * 255 byte push notification payload), then the display name may not be included. display name is also
   * included in an incoming call, {@link Call.remoteUserDisplayName}
   *
   * @returns display name
   */
  pushNotificationDisplayName?: string;
  /**
   * The {@link SinchClientListener} object handles events from the
   * {@link SinchClient} such as incoming calls.
   *
   * @param sinchClientListener - a {@link SinchClientListener}
   */
  addListener(sinchClientListener: SinchClientListener): void;
  /**
   * Remove listener for client events.
   *
   * @param sinchClientListener - a {@link SinchClientListener}
   */
  removeListener(sinchClientListener: SinchClientListener): void;
  /**
   * Enables the use of managed push, where Sinch is responsible for sending your app a push notification when
   * necessary.
   *
   * @param serviceWorker - filename of push ServiceWorker definition, default is sw.js
   */
  setSupportManagedPush(serviceWorker?: string): Promise<void>;
  /**
   * Terminates the Sinch client, while still leaving it some time to finish up currently
   * pending tasks, for example finishing pending HTTP requests.
   */
  terminate(): void;
  /**
   * Returns the {@link CallClient} object for placing and receiving calls.
   *
   * @returns the {@link CallClient} object.
   */
  callClient: CallClient;
  /**
   * Returns the id of the user associated with this {@link SinchClient}.
   *
   * @returns the local user id.
   */
  localUserId: string;
}

/**
 * The SinchClientBuilder class builds a new SinchClient instance.
 *
 * To construct a SinchClient, the required configuration parameters are:
 *
 *  - Application Key
 *  - Environment host
 *  - UserID
 *
 * It is optional to specify:
 *
 *  - CLI (Calling-Line Identifier / Caller-ID) that will be used for calls
 *    terminated to PSTN (Publicly Switched Telephone Network).
 *  - hmsDeviceToken & hmsApplicationId if Huawei Push is to be used.
 */
export declare interface SinchClientBuilder {
  /**
   * Sets the user id associated with the SinchClient.
   * @param userId - Must not be null.
   * @returns The SinchClientBuilder instance.
   */
  userId(userId: string): SinchClientBuilder;
  /**
   * Sets the application key associated with the SinchClient.
   * @param applicationKey - Must not be null.
   * @returns The SinchClientBuilder instance.
   */
  applicationKey(applicationKey: string): SinchClientBuilder;
  /**
   * Sets the environment host associated with the SinchClient.
   * @param environmentHost - Must not be null.
   * @returns The SinchClientBuilder instance.
   */
  environmentHost(environmentHost: string): SinchClientBuilder;
  /**
   * Sets the caller identifier used when calling with PSTN.
   * @param callerIdentifier - Optional, must not be null
   * @returns The SinchClientBuilder instance.
   */
  callerIdentifier(callerIdentifier: string): SinchClientBuilder;
  /**
   * Sets the fetch api to be used by rest request. If not set the standard
   * FetchApi will be used.
   * @param fetchApi - Optional, must not be null
   * @returns The SinchClientBuilder instance.
   */
  fetchApi(api: FetchAPI): SinchClientBuilder;
  /**
   * Overide internal creation of the local MediaStream.
   * @param mediaStreamFactory - MediaStream factory
   * @returns The SinchClientBuilder instance.
   */
  mediaStreamFactory(
    mediaStreamFactory: MediaStreamFactory
  ): SinchClientBuilder;
  /**
   * Overide internal creation of the local MediaStream.
   * @param videoConfiguration - constraints for video
   * @returns The SinchClientBuilder instance.
   */
  videoConfiguration(
    videoConfiguration: MediaTrackConstraints
  ): SinchClientBuilder;
  /**
   * Creates the resulting SinchClient.
   * @returns A new SinchClient instance.
   */
  build(): SinchClient;
}

/**
 * A `SinchClientListener` handles client state changes
 */
export declare interface SinchClientListener {
  /**
   * Tells the listener that the client has started and ready for initiating
   * outgoing calls.
   * __Note__ that in order to receive calls, {@link SinchClient.setSupportManagedPush} must be called.
   *
   * @param sinchClient - The client informing the listener that it started.
   */
  onClientStarted: (sinchClient: SinchClient) => void;
  /**
   * Tells the listener that there was an error in the {@link SinchClient}.
   *
   * @param sinchClient - The {@link SinchClient} informing the listener that an error
   *               occurred.
   * @param error - {@link SinchError} object that describes the problem.
   */
  onClientFailed: (sinchClient: SinchClient, error: SinchError) => void;
  /**
   * Tells the listener that registration credentials are needed.
   *
   * @param sinchClient - The {@link SinchClient} informing the listener to register credentials
   * @param clientRegistration - {@link ClientRegistration} object to call register on.
   */
  onCredentialsRequired: (
    sinchClient: SinchClient,
    clientRegistration: ClientRegistration
  ) => void;
}

export declare class SinchError {
  message: string;
  code: number;
  domain: ErrorType;
  constructor(message: string, code?: number, domain?: ErrorType);
}

export {};
