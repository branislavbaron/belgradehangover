/**
 * The external dependencies.
 */
import { compose, setStatic } from 'recompose';

/**
 * The internal dependencies.
 */
import Container from 'containers/components/container';
import withStore from 'containers/decorators/with-store';
import withSetup from 'containers/decorators/with-setup';
import { TYPE_NETWORK } from 'containers/constants';

export default compose(
	setStatic('type', TYPE_NETWORK),
	withStore(),
	withSetup({}, {
		tabs_in_url: true
	})
)(Container);
