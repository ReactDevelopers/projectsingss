import {LoginAction} from './LoginAction';
import {LogoutAction} from './LogoutAction';
import {PageAction} from './Page';
import { TableTemplateAction } from './TableTemplate';
import { DeleteConfirmAction } from './DeleteConfirmation';
import { SessionExpireAction } from './SessionExpireAction';
import { OldDateConfirmAction } from './OldDateConfirmation';

export type AppAction = LoginAction | LogoutAction | PageAction | SessionExpireAction | DeleteConfirmAction | TableTemplateAction | OldDateConfirmAction;